<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/26
 * Time: 23:56
 */
namespace App\Dao;
use App\Library\MyLog;
use DB;
use Themis\Article\ArticleKind;

class ArticleKindDao extends BaseDao
{
    //指定表名
    const TABLE = 'article_kind';

    /**
     * 获取全部文章分类
     */
    public static function getArticleKind()
    {
        $kindList = array(
            array(
                'value' =>  1,
                'name'  =>  '技术',
                'son'   =>  array(
                    array(
                        'value' =>  101,
                        'name'  =>  'PHP',
                    ),
                    array(
                        'value' =>  102,
                        'name'  =>  'python',
                    ),
                    array(
                        'value' =>  103,
                        'name'  =>  'java',
                    ),
                    array(
                        'value' =>  104,
                        'name'  =>  'c',
                    ),
                    array(
                        'value' =>  105,
                        'name'  =>  'GO',
                    ),
                    array(
                        'value' =>  106,
                        'name'  =>  '数据结构与算法',
                    ),
                    array(
                        'value' =>  107,
                        'name'  =>  '数据库',
                    ),
                    array(
                        'value' =>  108,
                        'name'  =>  '中间件'
                    ),
                ),
            ),

            array(
                'name'  =>  '人文修养',
                'value' =>  2,
                'son'   =>  array(
                    array(
                        'name'  =>  '小说',
                        'value' =>  201,
                    ),

                    array(
                        'name'  =>  '散文',
                        'value' =>  202,
                    ),

                    array(
                        'name'  =>  '随笔',
                        'value' =>  203,
                    ),
                ),
            ),
        );
        return $kindList;
    }

    /**
     * 通过ID获取类别信息
     * @param $kindId 类别ID
     * @return mixed
     */
    public static function getArticleKindById($kindId)
    {
        $result = DB::table(self::TABLE)->where('id', '=', $kindId)->first();
        return $result;
    }

    /**
     * 添加文章类别
     * @param $data
     * @return mixed
     */
    public static function addArticleKind($data)
    {
        $id = $data['id'];
        $exist = self::getArticleKindById($id);
        if ($exist) {
            return $id;
        }
        $kindData = array(
            'id'    =>  $data['id'],
            'create_admin_id'   =>  $data['create_admin_id'],
            'title' =>  $data['title'],
            'status' => ArticleKind::KIND_STATUS_NORMAL,
            'parent_id' => $data['parent_id'],
            'create_time' => time(),
            'db_time'   =>  time(),
        );
        return DB::table(self::TABLE)->insert($kindData);
    }

    /**
     * 获取文章列表
     * @param $where
     * @param $limit
     * @param $offset
     */
    public static function getArticleKindList($where, $limit, $offset, $orderField, $orderRule)
    {
        //$dbInstance = DB::table(self::TABLE);
        /*foreach ($where as $field => $value) {
            if (is_array($value)) {
                $dbInstance->whereIn($field, $value);
            } else {
                $dbInstance->where($field, '=', $value);
            }
        }*/
        $list = DB::table(self::TABLE)->where($where)->orderBy($orderField, $orderRule)->skip($offset)->take($limit)->get();
        return $list;
    }

    /**
     * 获取文章数量
     * @param $where
     */
    public static function getArticleKindCount($where)
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