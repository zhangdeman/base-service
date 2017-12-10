<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/3
 * Time: 19:34
 */
namespace App\Dao;
use DB;

class ArticleDao extends BaseDao
{
    //指定表名
    const TABLE = 'article';

    /**
     * 通过ID获取文章内容
     * @param $articleId
     * @return array
     */
    public static function getArticleById($articleId)
    {
        return DB::table(self::TABLE)->where('id', '=', $articleId)->first();
    }


    /**
     * 添加文章
     * @param $article
     * @return mixed
     */
    public static function addArticle($article)
    {
        $isExist = self::getArticleById($article['id']);
        if ($isExist) {
            return $article['id'];
        }

        $article['create_time'] = time();
        $article['db_time'] = time();
        $article['status'] = 0;
        return DB::table(self::TABLE)->insert($article);
    }


    /**
     * 获取文章列表
     * @param $where
     * @param $limit
     * @param $offset
     */
    public static function getArticleList($where, $limit, $offset, $orderField, $orderRule)
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
     * 获取文章数量
     * @param $where
     */
    public static function getArticleCount($where)
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