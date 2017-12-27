<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/10
 * Time: 18:12
 */
namespace App\Http\Controllers\Article;
use App\Dao\ArticleDao;
use App\Dao\ArticleKindDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;

class GetArticleKindList extends Controller
{
    public function __construct()
    {
    }

    /**
     * 获取文章类型列表
     * @param Request $request
     */
    public function getList(Request $request)
    {
        $where = array();

        $parentKind = $request->input('parent_id', null);
        if (!is_null($parentKind)) {
            $where['parent_id'] = $parentKind;
        }

        $orderField = $request->input('order_field', 'create_time');
        $orderRule = $request->input('order_rule', 'DESC');

        $pageSize = $request->input('page_size', 20);
        $currentPage = $request->input('current_page', 1);
        $offset = ($currentPage - 1) * $pageSize;
        $list = ArticleKindDao::getArticleKindList($where, $pageSize, $offset, $orderField, $orderRule);
        $articleCount = ArticleKindDao::getArticleKindCount($where);
        $totalPage = ceil($articleCount / $pageSize);
        $returnData = array(
            'article_kind_list' => $list,
            'total_page' => $totalPage,
            'current_page' => $currentPage,
            'page_limit' => $pageSize,
            'total_count' => $articleCount,
        );
        $this->success($returnData);
    }
}