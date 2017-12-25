<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/24
 * Time: 22:45
 */
namespace App\Http\Controllers\Permission;
use App\Dao\AdminPermissionDao;
use App\Dao\PermissionDao;
use App\Http\Controllers\Controller;
use App\Library\ArrayTool;
use Illuminate\Http\Request;
use Themis\Api\Out;

class AuthAdminPermission extends Controller
{
    public function __construct()
    {

    }


    public function authPermission(Request $request)
    {
        $roleId = $request->input('role_id');
        $permissionIds = $request->input('permission_ids');
        $adminId = $request->input('admin_id');
        $permissionIdArr = explode(',', $permissionIds);

        //获取当前角色所拥有的权限
        $currentPermission = AdminPermissionDao::getRolePermissionByRoleId($roleId);

        //当前权限ID集合
        $currentPermissionIds = ArrayTool::getFiled($currentPermission, 'permission_id');

        //在当前权限中，不再目标权限中，需删除
        $needDeletePermissionIds = array_diff($currentPermissionIds, $permissionIdArr);
        $deleteResult = array();
        if (!empty($needDeletePermissionIds)) {
            $deleteResult = AdminPermissionDao::batchRemoveRolePermission($roleId, $needDeletePermissionIds, $adminId);
        }

        //在目标权限中，不再当前权限中，需增加
        $needAddPermissionIds = array_diff($permissionIdArr, $currentPermissionIds);
        $addResult = array();
        if (!empty($needAddPermissionIds)) {
            $addResult = AdminPermissionDao::bathAddRolePermission($roleId, $adminId, $needAddPermissionIds);
        }

        $returnData = array(
            'delete_result' =>  $deleteResult,
            'add_result'    =>  $addResult,
            'current_permission' => $currentPermissionIds,
            'target_permission' => $permissionIdArr,
            'role_id'   =>  $roleId
        );

        $this->success($returnData);

    }
}