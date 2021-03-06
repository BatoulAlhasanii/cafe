@extends('admin-layout.app')

@section('head-links-scripts')
@endsection

@section('title')
Edit Product
@endsection

@section('content')
    <?php
        $translations = null;
        if(!empty($product)) {
            $translations = $product->productTranslations;
        }
    ?>

    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Edit Product</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-wrapper">
                    @foreach(config('app.available_locales') as $locale)

                        <?php
                            $translation = null;
                            if($translations) {
                                $translation = $translations->where('lang', $locale)->first();
                            }
                        ?>

                        <input type="hidden" name="product[{{ $locale }}][id]" value="{{ $translation ? $translation->id : '' }}" class="form-control">

                        <div class="form-group col-6">
                            <label for="name-{{ $locale }}">{{ ucfirst($locale) }} Name</label>
                            <input id="name-{{ $locale }}" type="text" placeholder="{{ ucfirst($locale) }} Name" name="product[{{ $locale }}][name]" value="{{ old('product.'.$locale.'.name') ?? ( $translation ? $translation->name : '' ) }}" class="form-control">
                            @error('product.'.$locale.'.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="description-{{ $locale }}">{{ ucfirst($locale) }} Product Description</label>
                            <textarea id="description-{{ $locale }}" class="form-control" name="product[{{ $locale }}][description]" rows="4">{{ old('product.'.$locale.'.description') ?? ( $translation ? $translation->description : '' ) }}</textarea>
                            @error('product.'.$locale.'.description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group col-12">
                            <div class="input-instructions">
                                <p>Please enter the product attributes and values in the form (Attribute: Value, Another attribute: Another value)</p>
                                <ul>
                                    <li>1. There should be comma between the different attributes</li>
                                    <li>2. There attribute and its value should be seperated by colon (:)</li>
                                </ul>
                                <div>Example:<br>Filling Type: High Vacuum, Shelf life: 540 days after date of manufacture</div>
                            </div>
                            <label for="attribute_value-{{ $locale }}">{{ ucfirst($locale) }} Product Attributes and Values</label>
                            <textarea id="attribute_value-{{ $locale }}" class="form-control" name="product[{{ $locale }}][attribute_value]" rows="4">{{ old('product.'.$locale.'.attribute_value') ?? ( $translation ? $translation->attribute_value : '' )  }}</textarea>
                            @error('product.'.$locale.'.attribute_value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="seperate-line"></div>
                    @endforeach

                    <div class="form-group col-6">
                        <label for="category_id">Product Category</label>
                        <select id="category_id" name="category_id" class="form-control">
                        <option value="0" selected disabled hidden>Select Product Category...</option>
                        @foreach ($categories as $category )
                            @if ( intval(old('category_id')) === intval($category->id) || ( empty(old('category_id')) && $product->category_id  === $category->id))
                            <option value="{{ $category->id }}" selected>{{ $category->categoryTranslations[0]->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->categoryTranslations[0]->name }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="flavor_id">Product Flavor</label>
                        <select id="flavor_id" name="flavor_id" class="form-control">
                        <option value="0" selected disabled hidden>Select Product Flavor...</option>
                        @foreach ($flavors as $flavor )
                            @if ( intval(old('flavor_id')) === intval($flavor->id) || ( empty(old('flavor_id')) && $product->flavor_id  === $flavor->id))
                            <option value="{{ $flavor->id }}" selected>{{ $flavor->flavorTranslations[0]->name }}</option>
                            @else
                            <option value="{{ $flavor->id }}">{{ $flavor->flavorTranslations[0]->name }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('flavor_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="sku">SKU</label>
                        <input id="sku" type="text" name="sku" value="{{ old('sku') ?? $product->sku }}" placeholder="SKU" class="form-control">
                        @error('sku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="weight">Weight (g)</label>
                        <input id="weight" type="text" name="unit_amount" value="{{ old('unit_amount') ?? $product->unit_amount }}" placeholder="Weight" class="form-control">
                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="price">Price ({{ config('currency.en') }})</label>
                        <input id="price" type="text" name="price" value="{{ old('price') ?? $product->price }}" placeholder="Price" class="form-control">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="discount_price">Discount Price ({{ config('currency.en') }})</label>
                        <input id="discount_price" type="text" name="discount_price" value="{{ old('discount_price') ?? $product->discount_price }}" placeholder="Discount Price" class="form-control">
                        @error('discount_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="is_featured">Featured Product</label>
                        <select id="is_featured" name="is_featured" class="form-control">
                        @foreach (['0' => 'No','1' => 'Yes'] as $key => $val)
                            @if ( old('is_featured') === strval($key) || ( empty(old('is_featured')) && $product->is_featured  === $key) )
                            <option value="{{ $key }}" selected>{{ $val }}</option>
                            @else
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('is_featured')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="is_active">Shown to Customer {{ old('is_active') === '0' }}</label>
                        <select id="is_active" name="is_active" class="form-control">
                        @foreach (['0' => 'No','1' => 'Yes'] as $key => $val)
                            @if ( old('is_active') === strval($key) || ( empty(old('is_active')) && $product->is_active  === $key))
                            <option value="{{ $key }}" selected>{{ $val }}</option>
                            @else
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('is_active')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Product Image</label>
                        <br>
                        <input type="file" id="image" name="images[0]"/>
                        <br>
                        @error('images.0')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Product Image</label>
                        <br>
                        <input type="file" id="image" name="images[1]"/>
                        <br>
                        @error('images.1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Product Image</label>
                        <br>
                        <input type="file" id="image" name="images[2]"/>
                        <br>
                        @error('images.2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Product Image</label>
                        <br>
                        <input type="file" id="image" name="images[3]"/>
                        <br>
                        @error('images.3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Product Image</label>
                        <br>
                        <input type="file" id="image" name="images[4]"/>
                        <br>
                        @error('images.4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Product Image</label>
                        <br>
                        <input type="file" id="image" name="images[5]"/>
                        <br>
                        @error('images.5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="deleted_images" value="{{ old('deleted_images') }}" id="product-deleted-images">
                        @if($product->images)
                            <div class="edit-product-images-wrapper">
                                @foreach(explode(',', $product->images) as $index => $image)
                                    @if (!old('deleted_images') || ( old('deleted_images') && str_contains(old('deleted_images')?? '', $image ?? '') === false))
                                    <div class="uploaded-img-wrapper">
                                        <span data-img-path="{{ $image }}" class="remove-symbol">x</span>
                                        <img id="edit-product-img-{{ $index }}" class="instance-img" value="0" src="{{ asset('/storage/' . $image) }}">
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        @error('deleted_images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if ($errors->any())
                        <div class="invalid-feedback">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="buttons-wrapper form-group col-12">
                        <div>
                            <button type="submit" class="btn submit-btn">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

