<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/2
 * Time: 13:44
 */
namespace App\Library;
use Crypt;

class Token
{
    public static function genToken($adminInfo, $loginIp)
    {
        $tokenInfo = array(
            'mail'      =>  $adminInfo->mail,
            'phone'     =>  $adminInfo->phone,
            'login_time'=>  time(),
            'id'        =>  $adminInfo->id,
            'login_ip'  =>  $loginIp
        );

        $adminToken = encrypt($tokenInfo);

        return $adminToken;
    }
}