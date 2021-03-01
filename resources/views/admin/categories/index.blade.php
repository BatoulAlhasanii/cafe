@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content container">
        <div class="page-title">
            <h1>Categories</h1>
        </div>
        <a href="{{ route('categories.create') }}" class="custom-btn">+ Add Category</a>
        @include('admin.components.session_messages')
        <div class="main-content">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr class="first last">
                            <th class="col-img">Image</th>
                            <th>Name</th>
                            <th>Shown to Customer</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="a-center img-content">
                                @if($category->image)
                                    <img src="{{ asset('/storage/' . $category->image) }}">
                                @endif
                            </td>
                            <td>
                                {{ $category->categoryTranslations()->where('lang', 'en')->first()->name }}
                            </td>
                            <td class="a-center">
                                @if($category->is_active)
                                    <span class="success">Yes</span>
                                @else
                                    <span class="danger">No</span>
                                @endif
                            </td>
                            <td class="a-center">
                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $categories->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
