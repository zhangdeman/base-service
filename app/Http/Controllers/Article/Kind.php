<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/2
 * Time: 23:26
 */

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dao\ArticleKindDao;

class Kind extends Controller
{
    public function __construct()
    {
    }

    /**
     * 获取文章分类
     * @param Request $request
     */
    public function getArticleKind(Request $request)
    {
        $kindList = ArticleKindDao::getArticleKind();
        $this->success($kindList);
    }
}