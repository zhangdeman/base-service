<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/21
 * Time: 22:33
 * 获取ID信息
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    /**
     * 登录操作
     * @param Request $request
     */
    public function doLogin(Request $request)
    {
        $validate = $this->validate($request , [
            'login_type'    =>  'required',
            'account'       =>  'required',
            'password'      =>  'required'
        ]);
        $loginType = $request->input('login_type'); //登录方式
        $account = $request->input('account');  //账号
        $password = $request->input('password');    //密码
    }

    /**
     * 验证登录
     * @param Request $request
     */
    public function validateLogin(Request $request)
    {}
}