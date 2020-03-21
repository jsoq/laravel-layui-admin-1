<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="{{ mix('/css/admin.css') }}" />
        <link rel="stylesheet" href="/layui/css/layui.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="/layui/layui.js"></script>
        @stack('head')
    </head>
    <body class="@yield('body-class')">
    @section('body')
    @show
    <script>
        layui.use(['jquery'], function () {
            let $ = layui.$;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    @stack('script')
    </body>
</html>
