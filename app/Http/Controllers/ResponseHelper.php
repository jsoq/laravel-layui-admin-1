<?php


namespace App\Http\Controllers;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait ResponseHelper
{
    public function respond($code, $msg, $data = null)
    {
        $respond = [
            'code' => $code,
            'msg' => $msg,
        ];
        if (!is_null($data)) {
            $respond = Arr::add($respond, 'data', $data);
        }
        return response()->json($respond);
    }

    public function success_respond($data = null, $msg = 'success')
    {
        return $this->respond(0, $msg, $data);
    }

    public function success_msg($msg = 'success')
    {
        return $this->respond(0, $msg);
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = Validator::make($request->all(), $rules, $messages, $customAttributes);
        if ($validator->fails()) {
            throw new HttpResponseException($this->respond(422, '参数校验失败', $validator->errors()));
        }
    }
}
