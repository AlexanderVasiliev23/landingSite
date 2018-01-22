<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Unique</title>
    <link rel="icon" href="{{ asset('assets//favicon.png') }}" type="image/png">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

    {{--<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>--}}
    {{--<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>--}}
    {{--<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    {{--<script src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.js"></script>

</head>
<body>
    <header id="header-wrapper">
        @yield('header')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
        @endif
    </header>
    @yield('content')
</body>
</html>