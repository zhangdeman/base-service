<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/26
 * Time: 23:56
 */
namespace App\Dao;
use DB;

class AdminDao extends BaseDao
{
    //指定表名
    const TABLE = 'admin';

    public static function addAdmin($adminInfo)
    {
        $insertData = array();
        $adminStructure = self::getAdminStructure();
        foreach ($adminStructure as $key => $field) {
            if (isset($adminInfo[$field])) {
                $insertData[$field] = $adminInfo[$field];
            }
        }

        $existAdminInfo = self::getAdminById($insertData['id']);
        if (!empty($existAdminInfo)) {
            return $existAdminInfo;
        }

        $insertData['salt'] = str_random(8);
        $insertData['password'] = self::genPassword($insertData['password'], $insertData['salt']);

        return DB::table(self::TABLE)->insert($insertData);
    }

    /**
     * 生成密码
     * @param $inputPassword
     * @param $salt
     * @return string
     */
    public static function genPassword($inputPassword, $salt)
    {
        return md5($inputPassword.md5($salt));
    }

    /**
     * 通过管理员ID获取管理员信息
     * @param $adminId 管理员ID
     * @return array
     */
    public static function getAdminById($adminId)
    {
        $result = DB::table(self::TABLE)->where('id', '=', $adminId)->first();
        return $result;
    }

    /**
     * 通过管理员ID获取管理员信息
     * @param $adminPhone 管理员ID
     * @return array
     */
    public static function getAdminByPhone($adminPhone)
    {
        $result = DB::table(self::TABLE)->where('phone', '=', $adminPhone)->first();
        return $result;
    }

    /**
     * 通过管理员邮箱获取管理员信息
     * @param $adminMail 管理员ID
     * @return array
     */
    public static function getAdminByMail($adminMail)
    {
        $result = DB::table(self::TABLE)->where('mail', '=', $adminMail)->first();
        return $result;
    }

    /**
     * 获取管理员列表
     * @param $where
     * @param $limit
     * @param $offset
     * @param $orderField
     * @param $orderRule
     * @return mixed
     */
    public static function getAdminList($where, $limit, $offset, $orderField, $orderRule)
    {
        $dbInstance = DB::table(self::TABLE);
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                $dbInstance->whereIn($field, $value);
            } else {
                $dbInstance->where($field, '=', $value);
            }
        }
        $list = DB::table(self::TABLE)->orderBy($orderField, $orderRule)->skip($offset)->take($limit)->get();
        return $list;
    }

    /**
     * 获取管理员数量
     * @param $where
     * @return mixed
     */
    public static function getAdminCount($where)
    {
        $dbInstance = DB::table(self::TABLE);
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                $dbInstance->whereIn($field, $value);
            } else {
                $dbInstance->where($field, '=', $value);
            }
        }
        $adminCount = $dbInstance->count();
        return $adminCount;
    }

    /**
     * 定义admin表结构
     * @return array
     */
    public static function getAdminStructure()
    {
        return array(
            'id',
            'encode_id',
            'name',
            'nickname',
            'role',
            'password',
            'mail',
            'salt',
            'phone',
            'create_time',
            'create_admin_id',
            'update_admin_id',
            'create_ip',
            'last_login_ip',
            'last_login_time',
            'db_time',
            'login_times'
        );
    }
}