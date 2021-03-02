<?php

namespace App\Repositories;

use App\Models\Flavor;
use App\Models\FlavorTranslation;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\FlavorContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

/**
 * Class FlavorRepository
 *
 * @package \App\Repositories
 */
class FlavorRepository extends BaseRepository implements FlavorContract
{
    use UploadAble;

    /**
     * FlavorRepository constructor.
     * @param Flavor $model
     */
    public function __construct(Flavor $model)
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
    public function listFlavors(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        if ($order !== 'id') {
            return $this->model->with(['flavorTranslations' => function($query) use ($order, $sort) {
                $query->where('lang', 'en')->select('flavor_id', 'name');
            }])->get();
        }
        return $this->model->paginate(config('settings.items_per_page'));
    }


    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findFlavorById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Flavor|mixed
     */
    public function createFlavor($request)
    {
        DB::beginTransaction();

        try {

            if ($request->image && ($request->image instanceof  UploadedFile)) {
                $image = $this->uploadOne($request->image, 'flavors');
            }


            $flavor = new Flavor();
            $flavor->fill([
                'slug' => Str::slug(strtolower($request->flavor['en']['name']), "-"),
                'image' => $image ?? null,
                'sequence' => 1,
                'is_active' => $request->is_active
            ]);


            $flavorTranslations = [];
            foreach ($request->flavor as $lang => $translation)
            {
                $flavorTranslations[] = new FlavorTranslation([
                    'name' => $translation['name'],
                    'lang' =>  $lang
                ]);
            }


            if ($flavor->save()) {
                $flavor->flavorTranslations()->saveMany($flavorTranslations);
            }

            DB::commit();

            return $flavor;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFlavor($request)
    {
        DB::beginTransaction();

        try {
            $flavor = $this->findFlavorById($request->id);

            $image = null;
            if ($request->image && ($request->image instanceof  UploadedFile)) {

                if ($flavor->image != null) {
                    $this->deleteOne($flavor->image);
                }

                $image = $this->uploadOne($request->image, 'flavors');
            }


            $updated = $flavor->update([
                'slug' => Str::slug(strtolower($request->flavor['en']['name']), "-"),
                'image' => $image ?? $flavor->image,
                'sequence' => 1,
                'is_active' => $request->is_active
            ]);

            if($updated) {
                foreach($request->flavor as $lang => $translation) {

                    if ($translation['id']) {
                        $flavorTranslation = FlavorTranslation::find($translation['id']);
                        if ($flavorTranslation) {
                            $flavorTranslation->name = $translation['name'];
                            $flavorTranslation->save();
                        }
                    } else {
                        $newFlavorTranslations = new FlavorTranslation([
                            'name' => $translation['name'],
                            'lang' =>  $lang
                        ]);
                        $flavor->flavorTranslations()->save($newFlavorTranslations);
                    }
                }
            }

            DB::commit();

            return $flavor;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteFlavor($id)
    {
        $flavor = $this->findFlavorById($id);

        if ($flavor->image != null) {
            $this->deleteOne($flavor->image);
        }

        $flavor->delete();

        return $flavor;
    }

    public function findBySlug($slug)
    {
        $flavor = Flavor::where('slug', $slug)
            ->where('is_active', true)
            ->with('flavorTranslations', function ($query) {
                $query->where('lang', app()->getLocale());
            })
            ->with(array('products' => function($query) {
                $query->where('is_active', true)
                ->whereHas('category', function($query) {
                    $query->where('is_active', true);
                })
                ->with(array('productTranslations' => function($query) {
                    $query->where('lang', app()->getLocale())->select('product_id', 'name');
                }));
            }))
            ->first();

        if ($flavor) {
            return $flavor;
        } else {
            throw new ModelNotFoundException();
        }
    }

    public function getFlavors()
    {
        $flavors = Flavor::where('is_active', true)
        ->with(array('flavorTranslations' => function($query) {
            $query->where('lang', app()->getLocale())->select('flavor_id', 'name');
        }))->get();

        return $flavors;
    }
}
