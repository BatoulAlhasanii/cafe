@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Edit Setting</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('settings.update',  $setting->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-wrapper">

                    <div class="form-group col-6">
                        <label for="{{ $setting->setting_name }}">{{ $setting->setting_label }}</label>
                        <select id="{{ $setting->setting_name }}" name="setting_value" class="form-control">
                        @foreach (['0' => 'No','1' => 'Yes'] as $key => $val)
                            @if ( intval(old('setting_value')) === intval($key) || ( empty(old('setting_value')) && intval($setting->setting_value)  === intval($key)) )
                            <option value="{{ $key }}" selected>{{ $val }}</option>
                            @else
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('setting_value')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
