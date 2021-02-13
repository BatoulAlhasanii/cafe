<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Brand;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
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
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model->paginate(config('settings.items_per_page'));
    }

    public function listFeaturedProducts()
    {
        return Product::where(['is_active' => true, 'is_featured' => true])
                ->with(array('productTranslations' => function($query) {
                    $query->where('lang', app()->getLocale())->select('product_id', 'name');
                }))->get();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct($request)
    {
        try {
            $images = [];
            if ($request->images) {
                foreach($request->images as $image) {
                    if ($image instanceof  UploadedFile) {
                        $images[] = $this->uploadOne($image, 'products');
                    }
                }
            }

            $stringOfImages = implode(",", $images);

            $product = new Product();
            $product->fill([
                'category_id' => $request->category_id,
                'brand_id' => Brand::$odebrechtId,
                'slug' => Str::slug(strtolower($request->product['en']['name']), "-"),
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'images' => $stringOfImages,
                'unit_amount' => $request->unit_amount,
                'sku' => $request->sku,
                'stock' => $request->stock,
                'is_featured' => $request->is_featured,
                'is_active' => $request->is_active
            ]);


            $productTranslations = [];
            foreach ($request->product as $lang => $translation)
            {
                $productTranslations[] = new ProductTranslation([
                    'name' => $translation['name'],
                    'unit' => ProductTranslation::$units[$lang],
                    'description' => $translation['description'],
                    'attribute_value' => null,
                    'lang' =>  $lang
                ]);
            }


            if ($product->save()) {
                $product->productTranslations()->saveMany($productTranslations);
            }

            return $product;


        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct($request)
    {
        $product = $this->findProductById($params['product_id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product->update($merge->all());

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->whereHas('category', function($query) {
                $query->where('is_active', true);
            })
            ->with(array('productTranslations' => function($query) {
                $query->where('lang', app()->getLocale());
            }))
            ->first();


        if($product) {
            return $product;
        } else {
            throw new ModelNotFoundException();
        }
    }
}
