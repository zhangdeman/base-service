<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/24
 * Time: 15:35
 */
namespace App\Http\Controllers\Permission;
use App\Dao\AdminPermissionDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api;

class GetRolePermission extends Controller
{
    public function __construct()
    {

    }

    public function getList(Request $request)
    {
        $roleId = $request->input('role_id');
        $list = AdminPermissionDao::getRolePermissionByRoleId($roleId);
        $this->success($list);
    }
}