@extends('admin/layouts/base')

@section('body-class', 'layui-layout-body')

@section('body')
<div class="layui-layout layui-layout-admin">
    <div class="layui-header layui-bg-black">
        <div class="layui-logo">
            <a href="{{ route('admin.home') }}">{{ app('admin.config')->get('site_name', 'Laravel-Layui-Admin') }}</a>
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
            <ul class="layui-nav layui-nav-tree">
                @foreach(app('admin.menu')->tree() as $menu)
                <li class="layui-nav-item @if(app('admin.menu')->isSelected($menu)) layui-this layui-nav-itemed @endif">
                    @if(count($menu->children) > 0)
                        <a href="javascript:;"><i class="layui-icon {{ $menu->icon }}"></i> {{ $menu->name }}</a>
                        <dl class="layui-nav-child @if(app('admin.menu')->isSelected($menu)) layui-this @endif">
                        @foreach($menu->children as $child)
                            <dd><a href="{{ $child->url }}"><i class="layui-icon {{ $child->icon }}"></i> {{ $child->name }}</a></dd>
                        @endforeach
                        </dl>
                    @else
                        <a href="{{ $menu->url }}"><i class="layui-icon {{ $menu->icon }}"></i> {{ $menu->name }}</a>
                    @endif
                @endforeach
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
