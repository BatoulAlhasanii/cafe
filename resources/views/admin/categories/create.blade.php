@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Create Category</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-wrapper">
                    @foreach(config('app.available_locales') as $locale)
                        <div class="form-group col-6">
                            <label for="name-{{ $locale }}">{{ ucfirst($locale) }} Name</label>
                            <input id="name-{{ $locale }}" type="text" placeholder="{{ ucfirst($locale) }} Name" name="category[{{ $locale }}][name]" value="{{ old('category.'.$locale.'.name') }}" class="form-control">
                            @error('category.'.$locale.'.name')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endforeach
                    <div class="form-group col-6">
                        <label for="is_active">Is Shown to Customer</label>
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
                    <div class="form-group col-12">
                        <label for="image">Category Image</label>
                        <br>
                        <input type="file" id="image" name="image"/>
                        @error('image')
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
