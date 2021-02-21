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

                <input type="hidden" name="setting_name" value="{{ $setting->setting_name }}">

                <div class="form-wrapper">
                    @if($setting->setting_name === 'activate_discount')
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
                    @elseif($setting->setting_name === 'tax')
                    <div class="form-group col-6">
                        <div class="input-instructions">
                            <p>Please enter the value as percentage (if task is 80% enter 80)</p>
                            <div>Example:<br>80</div>
                        </div>
                        <label for="{{ $setting->setting_name }}">{{ $setting->setting_label }}</label>
                        <input id="{{ $setting->setting_name }}" type="text" name="setting_value" value="{{ old('setting_value') ? floatval(old('setting_value')) : floatval($setting->setting_value) }}" placeholder="{{ $setting->setting_label }}" class="form-control">
                        @error('setting_value')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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

@section('javascript-scripts')
@endsection
