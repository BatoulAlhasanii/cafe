@extends('admin-layout.app')

@section('head-links-scripts')
@endsection

@section('title')
Edit Category
@endsection

@section('content')
    <?php
        $translations = null;
        if(!empty($category)) {
            $translations = $category->categoryTranslations;
        }
    ?>
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Edit Category</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('categories.update',  $category->id ) }}" method="POST" enctype="multipart/form-data">
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

                        <input type="hidden" name="category[{{ $locale }}][id]" value="{{ $translation ? $translation->id : '' }}" class="form-control">

                        <div class="form-group col-6">
                            <label for="name-{{ $locale }}">{{ ucfirst($locale) }} Name</label>{{old('category[$locale][name]') }}
                            <input id="name-{{ $locale }}" type="text" placeholder="{{ ucfirst($locale) }} Name" name="category[{{ $locale }}][name]" value="{{ old('category.'.$locale.'.name') ?? ( $translation ? $translation->name : '' )}}" class="form-control">
                            @error('category.'.$locale.'.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endforeach
                    <div class="form-group col-6">
                        <label for="is_active">Shown to Customer</label>
                        <select id="is_active" name="is_active" class="form-control">
                        @foreach (['0' => 'No','1' => 'Yes'] as $key => $val)
                            @if ( old('is_active') === strval($key) || ( empty(old('is_active')) && $category->is_active  === $key) )
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
                        <label for="image">Category Image</label>
                        <br>
                        <input type="file" id="image" name="image"/>
                        <br>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        @if($category->image)
                            <img class="instance-img" src="{{ asset('/storage/' . $category->image) }}">
                        @endif
                    </div>
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

@section('javascript-scripts')
@endsection
