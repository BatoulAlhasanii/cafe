<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
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
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        if ($order !== 'id') {
            return $this->model->where('parent_id', Category::$coffeeId)
            ->with(['categoryTranslations' => function($query) use ($order, $sort) {
                $query->where('lang', 'en')->select('category_id', 'name');
            }])->get();
        }
        return $this->model->where('parent_id', Category::$coffeeId)->paginate(config('settings.items_per_page'));
    }


    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory($request)
    {
        DB::beginTransaction();

        try {

            if ($request->image && ($request->image instanceof  UploadedFile)) {
                $image = $this->uploadOne($request->image, 'categories');
            }


            $category = new Category();
            $category->fill([
                'slug' => Str::slug(strtolower($request->category['en']['name']), "-"),
                'image' => $image ?? null,
                'sequence' => 2,
                'parent_id' => Category::$coffeeId,
                'is_active' => $request->is_active
            ]);


            $categoryTranslations = [];
            foreach ($request->category as $lang => $translation)
            {
                $categoryTranslations[] = new CategoryTranslation([
                    'name' => $translation['name'],
                    'lang' =>  $lang
                ]);
            }


            if ($category->save()) {
                $category->categoryTranslations()->saveMany($categoryTranslations);
            }

            DB::commit();

            return $category;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory($request)
    {
        DB::beginTransaction();

        try {
            $category = $this->findCategoryById($request->id);

            $image = null;
            if ($request->image && ($request->image instanceof  UploadedFile)) {

                if ($category->image != null) {
                    $this->deleteOne($category->image);
                }

                $image = $this->uploadOne($request->image, 'categories');
            }


            $updated = $category->update([
                'slug' => Str::slug(strtolower($request->category['en']['name']), "-"),
                'image' => $image ?? $category->image,
                'sequence' => 2,
                'parent_id' => Category::$coffeeId,
                'is_active' => $request->is_active
            ]);

            if($updated) {
                foreach($request->category as $lang => $translation) {

                    if ($translation['id']) {
                        $categoryTranslation = CategoryTranslation::find($translation['id']);
                        if ($categoryTranslation) {
                            $categoryTranslation->name = $translation['name'];
                            $categoryTranslation->save();
                        }
                    } else {
                        $newCategoryTranslations = new CategoryTranslation([
                            'name' => $translation['name'],
                            'lang' =>  $lang
                        ]);
                        $category->categoryTranslations()->save($newCategoryTranslations);
                    }
                }
            }

            DB::commit();

            return $category;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('name');
    }

    public function findBySlug($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->with('categoryTranslations', function ($query) {
                $query->where('lang', app()->getLocale());
            })
            ->with(array('products' => function($query) {
                $query->where('is_active', true)
                ->with(array('productTranslations' => function($query) {
                    $query->where('lang', app()->getLocale())->select('product_id', 'name');
                }));
            }))
            ->first();

        if ($category) {
            return $category;
        } else {
            throw new ModelNotFoundException();
        }
    }

    public function getCoffeeCategories()
    {
        $categories = Category::where('parent_id', \App\Models\Category::$coffeeId)
        ->where('is_active', true)
        ->with(array('categoryTranslations' => function($query) {
            $query->where('lang', app()->getLocale())->select('category_id', 'name');
        }))->get();

        return $categories;
    }
}
