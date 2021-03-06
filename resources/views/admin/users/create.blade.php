@extends('admin-layout.app')

@section('head-links-scripts')
@endsection

@section('title')
Create User
@endsection

@section('content')
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Create User</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-wrapper">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="password">User Password</label>
                        <input id="password" type="password" placeholder="Password" name="password" value="{{ old('password') }}" class="form-control">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-instructions">
                            <p>The password must be at least 10 characters and must contain:
                            <ul>
                                <li>- At least one lowercase letter</li>
                                <li>- At least one uppercase letter</li>
                                <li>- At least one digit</li>
                                <li>- A special character</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="role_id">User Role</label>
                        <select id="role_id" name="role_id" class="form-control">
                        <option value="0" selected disabled hidden>Select User Role...</option>
                        @foreach ($roles as $role)
                            @if ( intval(old('role_id')) === intval($role->id))
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('role_id')
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
