<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Contracts\PermissionContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class PermissionRepository extends BaseRepository implements PermissionContract
{

    /**
     * CategoryRepository constructor.
     * @param Permission $model
     */
    public function __construct(Permission $model)
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
    public function listPermissions(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findPermissionById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Permission|mixed
     */
    public function createPermission(array $params)
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
    public function updatePermission(array $params)
    {

    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deletePermission($id)
    {
        $permission = $this->findPermissionById($id);

        if ($permission->logo != null) {
            $this->deleteOne($permission->logo);
        }

        $permission->delete();

        return $permission;
    }
}
