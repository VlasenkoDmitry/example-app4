@if ($message = Session::get('success'))
    <div class="container">
        <div class="row">
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        </div>
    </div>
@endif


{{--@if ($message = Session::get('error'))--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="alert alert-danger" role="alert">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

