<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseHelper;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    use ResponseHelper;

    public function editBaseConfig(Request $request)
    {
        $this->validate($request, [
            'site_name' => 'nullable|string',
            'icp' => 'nullable|string',
        ], [], [
            'site_name' => '站点名称',
            'icp' => 'ICP备案号',
        ]);
        $manager = app('admin.config');
        DB::beginTransaction();
        try {
            if ($manager->set('site_name', $request->site_name, true)
                && $manager->set('icp', $request->icp, true)) {
                DB::commit();
                return $this->success_msg('修改成功');
            }
            DB::rollBack();
            return $this->respond(-1, '修改失败');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respond(500, '修改出错' . $e->getMessage());
        }
    }
}
