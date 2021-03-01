@if (Session::has('error') && count(Session::get('error')))
    <ul class="messages">
        <li class="error-msg">
            <ul>
                @foreach(Session::get('error') as $key => $value)
                <li>{{ $value }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
@endif
@if (Session::has('success') && count(Session::get('success')))
    <ul class="messages">
        <li class="success-msg">
            <ul>
                @foreach(Session::get('success') as $key => $value)
                <li>{{ $value }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
@endif
