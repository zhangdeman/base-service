<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/26
 * Time: 23:56
 */
namespace App\Dao;
use DB;

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
}