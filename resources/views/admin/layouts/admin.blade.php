@extends('admin/layouts/base')

@section('body-class', 'layui-layout-body')

@section('body')
<div class="layui-layout layui-layout-admin">
    <div class="layui-header layui-bg-cyan">
        <div class="layui-logo">
            <a href="{{ route('admin.home') }}">Laravel-Layui-Admin</a>
        </div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    {{ auth()->user()->name }}
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">个人资料</a></dd>
                    <dd><a href="">修改密码</a></dd>
                    <dd class="logout-btn"><a href="javascript:;">注销</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">所有商品</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">解决方案</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">云市场</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        @section('layui-body')
        @show
    </div>

    <div class="layui-footer">
        &copy; chenlijun.com
    </div>
</div>
@endsection

@push('script')
<script>
    layui.use(['element', 'jquery', 'layer'], function () {
        let element = layui.element, $ = layui.$, layer = layui.layer;
        $('.logout-btn').click(function () {
            layer.confirm('确认注销登录吗？', {title: '提示'}, function (index) {
                $.ajax({
                    url: "{{ route('api.admin.user.logout') }}",
                    method: 'post',
                    success: function (res) {
                        layer.msg(res.msg);
                        if (res.code === 0) {
                            layer.close(index);
                            setTimeout(function () {
                                window.location.href = "{{ route('admin.login') }}";
                            }, 500);
                        }
                    },
                    error: function (res) {
                        layer.msg('服务器错误');
                    }
                })
            });
        });
    });
</script>
@endpush
