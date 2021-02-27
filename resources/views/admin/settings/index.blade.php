@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content container settings-page">
        <div class="page-title">
            <h1>Settings</h1>
        </div>
        <div class="main-content">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr class="first last">
                            <th>Name</th>
                            <th>Value</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td class="a-center">
                                {{ $setting->setting_label }}
                            </td>
                            <td class="a-center">
                                @if($setting->setting_name === 'activate_discount')
                                    @if($setting->setting_value)
                                        <span class="success">Yes</span>
                                    @else
                                        <span class="danger">No</span>
                                    @endif
                                @elseif($setting->setting_name === 'tax')
                                    {{ $setting->setting_value }} %
                                @elseif($setting->setting_name === 'max_total_to_pay_shipping_fee')
                                    {{ $setting->setting_value }} {{ config('currency.en') }}
                                @endif
                            </td>
                            <td class="a-center">
                                <a href="{{ route('settings.edit', ['id' => $setting->id]) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
