<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Contracts\SettingContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class SettingRepository extends BaseRepository implements SettingContract
{

    /**
     * CategoryRepository constructor.
     * @param Setting $model
     */
    public function __construct(Setting $model)
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
    public function listSettings(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findSettingById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateSetting($request)
    {
        $setting = $this->findSettingById($request->id);

        $updated = $setting->update([
            'setting_value' => $request->setting_value
        ]);

        return $setting;
    }


}
