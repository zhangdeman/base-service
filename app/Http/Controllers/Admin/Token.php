<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/3
 * Time: 17:07
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Themis\Api\Out;
use App\Http\Controllers\Controller;
use App\Dao\AdminDao;

class Token extends Controller
{

    public function __construct()
    {
    }

    /**
     * 验证token
     * @param Request $request
     */
    public function validateToken(Request $request)
    {
        $token = $request->input('token');
        if (empty($token) || empty($tokenInfo = decrypt($token))) {
            //token校验失败
            $this->error(Out::ERROR_EXCEPTION_TOKEN);
        }

        $adminId = $tokenInfo['id'];
        $adminInfo = AdminDao::getAdminById($adminId);
        if (empty($adminInfo)) {
            $this->error(Out::ERROR_NIL_ACCOUNT);
        }

        $this->success($adminInfo);
    }
}