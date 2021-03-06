@extends('admin-layout.app')

@section('head-links-scripts')
@endsection

@section('title')
Flavors
@endsection

@section('content')
    <div class="page-content container">
        <div class="page-title">
            <h1>Flavors</h1>
        </div>
        <a href="{{ route('flavors.create') }}" class="custom-btn">+ Add Flavor</a>
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
                        @foreach($flavors as $flavor)
                        <tr>
                            <td class="a-center img-content">
                                @if($flavor->image)
                                    <img src="{{ asset('/storage/' . $flavor->image) }}">
                                @endif
                            </td>
                            <td>
                                {{ $flavor->flavorTranslations()->where('lang', 'en')->first()->name }}
                            </td>
                            <td class="a-center">
                                @if($flavor->is_active)
                                    <span class="success">Yes</span>
                                @else
                                    <span class="danger">No</span>
                                @endif
                            </td>
                            <td class="a-center">
                                <a href="{{ route('flavors.edit', ['id' => $flavor->id]) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $flavors->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
