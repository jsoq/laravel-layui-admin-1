<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ResponseHelper;

    public function login(Request $request)
    {
        $this->validate($request, [
            'account' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('account', $request->account)->orWhere('email', $request->account)
            ->orWhere('phone', $request->account)->first();
        if (empty($user) || !Hash::check($request->password, $user->password)) {
            return $this->respond(-1, '帐号或密码错误');
        }
        auth()->login($user);
        return $this->success_msg('登录成功');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return $this->success_msg('登出成功');
    }
}
