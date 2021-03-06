@extends('admin-layout.app')

@section('head-links-scripts')
@endsection

@section('title')
Users
@endsection

@section('content')
    <div class="page-content container">
        <div class="page-title">
            <h1>Users</h1>
        </div>
        <a href="{{ route('users.create') }}" class="custom-btn">+ Add User</a>
        <div class="main-content">
            <table class="data-table">
                <thead>
                    <tr class="first last">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="a-center">
                            {{ $user->name }}
                        </td>
                        <td class="a-center">
                            {{ $user->email }}
                        </td>
                        <td class="a-center">
                            {{ $user->role->name }}
                        </td>
                        <td class="a-center">
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
