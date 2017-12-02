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
use App\Dao\AdminDao;
use Themis\Admin\Admin;
use Themis\Api\Out;
use App\Library\Token;

class Login extends Controller
{
    /**
     * 登录操作
     * @param Request $request
     */
    public function doLogin(Request $request)
    {
        /*$validate = $this->validate($request , [
            'login_type'    =>  'required',
            'account'       =>  'required',
            'password'      =>  'required'
        ]);*/
        $loginType = $request->input('login_type'); //登录方式
        $account = $request->input('account');  //账号
        $password = $request->input('password');   //密码
        $loginIp = $request->input('login_ip');

        if ($loginType == Admin::LOGIN_TYPE_PHONE) {
            $adminInfo = AdminDao::getAdminByPhone($account);
        } else {
            $adminInfo = AdminDao::getAdminByMail($account);
        }

        if (empty($adminInfo)) {
            $this->error(Out::ERROR_NIL_ACCOUNT, Out::getErrorMsg(Out::ERROR_NIL_ACCOUNT), $request->all());
        }

        $inputPassword = AdminDao::genPassword($password, $adminInfo->salt);
        if ($inputPassword != $adminInfo->password) {
            $this->error(Out::ERROR_ADMIN_ACCOUNT_NO_MATCH, Out::getErrorMsg(Out::ERROR_ADMIN_ACCOUNT_NO_MATCH), $adminInfo);
        }

        $loginToken = Token::genToken($adminInfo, $loginIp);

        $this->success(array('token' => $loginToken));
    }

    /**
     * 验证登录
     * @param Request $request
     */
    public function validateLogin(Request $request)
    {}
}