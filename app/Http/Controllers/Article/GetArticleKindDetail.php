<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/18
 * Time: 23:33
 */
namespace App\Http\Controllers\Article;
use App\Dao\ArticleKindDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;

class GetArticleKindDetail extends Controller
{
    public function __construct()
    {

    }


    public function detail(Request $request)
    {
        $id = $request->input('id');
        $detail = ArticleKindDao::getArticleKindById($id);
        $this->success($detail);
    }
}