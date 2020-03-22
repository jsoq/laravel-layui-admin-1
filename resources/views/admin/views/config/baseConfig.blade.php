@extends('admin/layouts/admin')

@section('layui-body')
<form class="layui-form layui-form-pane normal" lay-filter="do-form">
    <div class="layui-form-item">
        <label class="layui-form-label">站点名称</label>
        <div class="layui-input-block">
            <input name="site_name" class="layui-input" placeholder="请输入站点名称" value="{{ app('admin.config')->get('site_name', 'Laravel-Layui-Admin') }}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">ICP备案号</label>
        <div class="layui-input-block">
            <input name="icp" class="layui-input" placeholder="请输入ICP备案号" value="{{ app('admin.config')->get('icp') }}">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="button" class="layui-btn save">保存</button>
        </div>
    </div>
</form>
@endsection
@push('script')
<script>
    layui.use(['jquery', 'form', 'layer'], function () {
        let $ = layui.$, form = layui.form;
        $('.save').click(function () {
            $.ajax({
                url: "{{ route('api.admin.config.editBaseConfig') }}",
                method: 'post',
                data: form.val('do-form'),
                success: function (res) {
                    layer.msg(res.msg);
                    if (res.code === 0) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    }
                },
                error: function (res) {
                    layer.msg('服务器错误');
                }
            });
        });
    });
</script>
@endpush
