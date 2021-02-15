<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Contracts\RoleContract;
use App\Http\Controllers\BaseController;
use App\Models\User;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends BaseController
{
    /**
     * @var UserContract
     */
    protected $userRepository;
    protected $roleRepository;

    /**
     * UserController constructor.
     * @param UserContract $userRepository
     */
    public function __construct(UserContract $userRepository, RoleContract $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userRepository->listUsers();

        return view('admin.users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = $this->roleRepository->listRoles();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, User::rules());

        $user = $this->userRepository->createUser($request);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }
        return $this->responseRedirect('users.index', 'User added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->userRepository->findUserById($id);
        $roles = $this->roleRepository->listRoles();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, User::rules());

        $user = $this->userRepository->updateUser($request);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while updating user.', 'error', true, true);
        }
        return $this->responseRedirect('users.index', 'User updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = $this->userRepository->deleteUser($id);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while deleting user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User deleted successfully' ,'success',false, false);
    }
}
