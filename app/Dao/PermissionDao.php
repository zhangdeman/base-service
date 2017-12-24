<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/23
 * Time: 18:31
 */

namespace App\Dao;
use DB;
use Themis\Permission\Permission;

class PermissionDao extends BaseDao
{
    //指定表名
    const TABLE = 'permission';

    /**
     * 获取权限列表
     * @param $where 条件
     * @param $orderField 排序字段
     * @param $orderRule 排序规则
     * @param $limit 查询数量
     * @param $offset 偏移量
     * @return mixed
     */
    public static function getPermissionList($where, $orderField, $orderRule, $limit, $offset)
    {
        $dbInstance = DB::table(self::TABLE);

        foreach ($where as $field => $value) {
            if (is_array($value)) {
                $dbInstance->whereIn($field, $value);
            } else {
                $dbInstance->where($field, '=', $value);
            }
        }
        $list = $dbInstance->orderBy($orderField, $orderRule)->skip($offset)->take($limit)->get();
        return $list;
    }

    /**
     * 查询数量
     * @param $where
     * @return mixed
     */
    public static function getPermissionCount($where)
    {
        $dbInstance = DB::table(self::TABLE);
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                $dbInstance->whereIn($field, $value);
            } else {
                $dbInstance->where($field, '=', $value);
            }
        }
        $count = $dbInstance->count();
        return $count;
    }

    /**
     * 添加权限
     * @param $data
     * @return mixed
     */
    public static function add($data)
    {
        $insertData = array(
            'id'    =>  $data['id'],
            'create_admin_id'   =>  $data['create_admin_id'],
            'parent_id' =>  $data['parent_id'],
            'name'  =>  $data['name'],
            'desc'  =>  $data['desc'],
            'real_controller'   =>  $data['real_controller'],
            'real_action'       =>  $data['real_action'],
            'request_uri'       =>  $data['request_uri'],
            'create_time'   =>  time(),
            'status'    =>  Permission::PERMISSION_STATUS_NORMAL
        );

        $result = DB::table(self::TABLE)->insert($insertData);
        return $result;
    }
}