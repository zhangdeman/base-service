<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/10
 * Time: 18:12
 */
namespace App\Http\Controllers\Article;
use App\Dao\ArticleDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;

class GetArticleList extends Controller
{
    public function __construct()
    {
    }

    /**
     * 获取文章列表
     * @param Request $request
     */
    public function getList(Request $request)
    {
        $articleParentType = $request->input('parent_kind', null);
        $articleSonType = $request->input('son_kind', null);
        $where = array();
        if (!is_null($articleParentType)) {
            $where['parent_kind'] = $articleParentType;
        }

        if (!is_null($articleSonType)) {
            $where['son_kind'] = $articleSonType;
        }

        $orderField = $request->input('order_field', 'create_time');
        $orderRule = $request->input('order_rule', 'DESC');

        $pageSize = $request->input('page_size', 20);
        $currentPage = $request->input('current_page', 1);
        $offset = ($currentPage - 1) * $pageSize;
        $list = ArticleDao::getArticleList($where, $pageSize, $offset, $orderField, $orderRule);
        $articleCount = ArticleDao::getArticleCount($where);
        $totalPage = ceil($articleCount / $pageSize);
        $returnData = array(
            'article_list' => $list,
            'total_page' => $totalPage,
            'current_page' => $currentPage,
            'page_limit' => $pageSize,
            'total_count' => $articleCount
        );
        $this->success($returnData);
    }
}