<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/24
 * Time: 15:23
 */

namespace App\Dao;
use App\Library\IdWorker;
use DB;

class AdminPermissionDao extends BaseDao
{
    const TABLE = 'admin_permission';

    /**
     * 获取角色的权限
     * @param $roleId
     * @return mixed
     */
    public static function getRolePermissionByRoleId($roleId)
    {
        $list = DB::table(self::TABLE)->where('role_id', '=', $roleId)->get();
        return $list;
    }

    /**
     * 为角色添加权限
     * @param $roleId
     * @param $permissionId
     * @param $adminId
     * @return mixed
     */
    public static function addRolePermission($roleId, $permissionId, $adminId)
    {
        $insertData = array(
            'id'    =>  IdWorker::generateId(),
            'role_id'   =>  $roleId,
            'permission_id' => $permissionId,
            'create_admin_id' => $adminId,
            'create_time' => time()
        );
        $result = DB::table(self::TABLE)->insert($insertData);
        return array($permissionId => $result);
    }

    /**
     * 批量授权
     * @param $roleId
     * @param $adminId
     * @param $permissionIdList
     * @return array
     */
    public static function bathAddRolePermission($roleId, $adminId, $permissionIdList)
    {
        $returnData = array();
        foreach ($permissionIdList as $permissionId) {
            $result = self::addRolePermission($roleId, $permissionId, $adminId);
            $returnData[$permissionId] = $result[$permissionId];
        }

        return $returnData;
    }

    /**
     * 移除角色的一个权限
     * @param $roleId
     * @param $permissionId
     * @param $adminId
     * @return mixed
     */
    public static function removeRolePermission($roleId, $permissionId, $adminId)
    {
        $where = array(
            'role_id'   =>  $roleId,
            'permission_id' =>  $permissionId
        );
        $result = DB::table(self::TABLE)->where($where)->delete();
        return array($permissionId => $result);
    }

    /**
     * 移除角色的一个权限
     * @param $roleId
     * @param $permissionIdList
     * @param $adminId
     * @return mixed
     */
    public static function batchRemoveRolePermission($roleId, $permissionIdList, $adminId)
    {
        $returnData = array();

        foreach ($permissionIdList as $permissionId) {
            $result = self::removeRolePermission($roleId, $permissionId, $adminId);
            $returnData[$permissionId] = $result[$permissionId];
        }
        return $returnData;
    }

}