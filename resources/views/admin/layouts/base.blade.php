<html>
    <head>
        <title></title>
        <script src="{{ mix('/css/admin.css') }}"></script>
        @stack('head')
    </head>
    <body>
    @section('body')
    @endsection
    @stack('script')
    </body>
</html>
