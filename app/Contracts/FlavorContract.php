<?php

namespace App\Contracts;



/**
 * Interface FlavorContract
 * @package App\Contracts
 */
interface FlavorContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listFlavors(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findFlavorById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createFlavor($request);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFlavor($request);

    /**
     * @param $id
     * @return bool
     */
    public function deleteFlavor($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

}
