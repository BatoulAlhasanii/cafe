@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <?php
        $translations = null;
        if(!empty($flavor)) {
            $translations = $flavor->flavorTranslations;
        }
    ?>
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Edit Flavor</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('flavors.update',  $flavor->id ) }}" method="POST" enctype="multipart/form-data">
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

                        <input type="hidden" name="flavor[{{ $locale }}][id]" value="{{ $translation ? $translation->id : '' }}" class="form-control">

                        <div class="form-group col-6">
                            <label for="name-{{ $locale }}">{{ ucfirst($locale) }} Name</label>{{old('flavor[$locale][name]') }}
                            <input id="name-{{ $locale }}" type="text" placeholder="{{ ucfirst($locale) }} Name" name="flavor[{{ $locale }}][name]" value="{{ old('flavor.'.$locale.'.name') ?? ( $translation ? $translation->name : '' )}}" class="form-control">
                            @error('flavor.'.$locale.'.name')
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
                            @if ( old('is_active') === strval($key) || ( empty(old('is_active')) && $flavor->is_active  === $key) )
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
                        <label for="image">Flavor Image</label>
                        <br>
                        <input type="file" id="image" name="image"/>
                        <br>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        @if($flavor->image)
                            <img class="instance-img" src="{{ asset('/storage/' . $flavor->image) }}">
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
