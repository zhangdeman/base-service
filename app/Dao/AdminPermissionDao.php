<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/24
 * Time: 15:23
 */

namespace App\Dao;
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

}