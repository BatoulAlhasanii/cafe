<?php

namespace App\Repositories;

use App\Models\Role;
use App\Contracts\RoleContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class RoleRepository extends BaseRepository implements RoleContract
{

    /**
     * CategoryRepository constructor.
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRoles(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model->orderBy('name','asc')->get();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findRoleById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Role|mixed
     */
    public function createRole(array $params)
    {
        try {


        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRole(array $params)
    {

    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteRole($id)
    {
        $role = $this->findRoleById($id);

        if ($role->logo != null) {
            $this->deleteOne($role->logo);
        }

        $role->delete();

        return $role;
    }
}
