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
}