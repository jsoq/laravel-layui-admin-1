@extends('admin/layouts/base')

@section('body-class', 'login')
@section('body')
    <div class="login-panel">
        <div class="head">
            <div class="site-name">
                <i class="layui-icon layui-icon-fire"></i>
                Laravel-Layui-Admin
            </div>
        </div>
        <div class="layui-form login-form layui-form-pane">
            <div class="layui-form-item">
                <label class="layui-form-label">帐号</label>
                <div class="layui-input-block">
                    <input id="account" class="layui-input" placeholder="请输入帐号">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                    <input id="password" type="password" class="layui-input" placeholder="请输入密码">
                </div>
            </div>
            <button type="button" class="layui-btn layui-btn-normal login-btn">登录</button>
        </div>
    </div>
    <div class="copyright">&copy; 2020</div>
@endsection
@push('script')
<script>
    layui.use(['layer'], function () {
        var $ = layui.$, layer = layui.layer;
        $('.login-btn').click(function () {
            $.ajax({
                url: "{{ route('api.admin.user.login') }}",
                method: 'post',
                data: {
                    account: $('#account').val(),
                    password: $('#password').val(),
                },
                success: function (res) {
                    layer.msg(res.msg);
                    if (res.code === 0) {
                        setTimeout(function () {
                            window.location.href = "{{ route('admin.home') }}";
                        }, 500);
                    } else if (res.code === 422) {

                    }
                },
                error: function (res) {
                    layer.msg('登录出错');
                }
            })
        });
    });
</script>
@endpush
