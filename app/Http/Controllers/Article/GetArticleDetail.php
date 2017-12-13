<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/13
 * Time: 21:34
 */
namespace App\Http\Controllers\Article;
use App\Dao\ArticleDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;
class GetArticleDetail extends Controller
{
    public function __construct()
    {

    }

    public function getArticle(Request $request)
    {
        $articleId = $request->input('article_id');
        $articleInfo = ArticleDao::getArticleById($articleId);
        $this->success($articleInfo);
    }
}