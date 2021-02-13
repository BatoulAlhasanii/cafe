@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Create Product</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-wrapper">
                    @foreach(config('app.available_locales') as $locale)
                        <div class="form-group col-6">
                            <label for="name-{{ $locale }}">{{ ucfirst($locale) }} Name</label>
                            <input id="name-{{ $locale }}" type="text" placeholder="{{ ucfirst($locale) }} Name" name="product[{{ $locale }}][name]" value="{{ old('product.'.$locale.'.name') }}" class="form-control">
                            @error('product.'.$locale.'.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="description-{{ $locale }}">{{ ucfirst($locale) }} Product Description</label>
                            <textarea id="description-{{ $locale }}" class="form-control" name="product[{{ $locale }}][description]" rows="4">{{ old('product.'.$locale.'.description') }}</textarea>
                            @error('product.'.$locale.'.description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="variables-{{ $locale }}">{{ ucfirst($locale) }} Product Attributes and Values</label>
                            <textarea id="variables-{{ $locale }}" class="form-control" name="product[{{ $locale }}][variables]" rows="4">{{ old('product.'.$locale.'.variables') }}</textarea>
                            @error('product.'.$locale.'.variables')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="seperate-line"></div>
                    @endforeach

                    <div class="form-group col-6">
                        <label for="stock">Stock</label>
                        <input id="stock" type="text" name="stock" value="{{ old('stock') }}" placeholder="Stock" class="form-control">
                        @error('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="weight">Weight (g)</label>
                        <input id="weight" type="text" name="unit_amount" value="{{ old('unit_amount') }}" placeholder="Weight" class="form-control">
                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="price">Price ({{ config('currency.en') }})</label>
                        <input id="price" type="text" name="price" value="{{ old('price') }}" placeholder="Price" class="form-control">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="discount_price">Discount Price ({{ config('currency.en') }})</label>
                        <input id="discount_price" type="text" name="discount_price" value="{{ old('discount_price') }}" placeholder="Discount Price" class="form-control">
                        @error('discount_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="is_active">Is Shown to Customer {{ old('is_active') === '0' }}</label>
                        <select id="is_active" name="is_active" class="form-control">
                        @foreach (['1' => 'Yes','0' => 'No'] as $key => $val)
                            @if ( old('is_active') === strval($key))
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


                    <div class="form-group col-6">
                        <label for="category_id">Product Category</label>
                        <select id="category_id" name="category_id" class="form-control">
                        <option value="0">Select Product Category...</option>
                        @foreach ($categories as $category)
                            @if ( old('category_id') === $category->id)
                            <option value="{{ $category->id }}">{{ $category->categoryTranslations[0]->name }}</option>
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


                    <div class="form-group col-12">
                        <label for="image">Product Images</label>
                        <br>
                        <input type="file" id="image" name="images"/>
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="buttons-wrapper form-group col-12">
                        <div>
                            <button type="submit" class="btn submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript-scripts')
@endsection
