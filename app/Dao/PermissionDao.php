<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/23
 * Time: 18:31
 */

namespace App\Dao;
use DB;

class PermissionDao extends BaseDao
{
    //指定表名
    const TABLE = 'permission';

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
}