<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 17/12/17
 * Time: 15:50
 */
namespace App\Http\Controllers\Article;
use App\Dao\ArticleKindDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;

class AddArticleKind extends Controller
{
    public function __construct()
    {

    }


    public function add(Request $request)
    {
        $result = ArticleKindDao::addArticleKind($request->all());
        if ($result) {
            $this->success(array('id' => $request->input('id')));
        } else {
            $this->error(Out::ERROR_ADD_ARTICLE_KIND_FIAL);
        }
    }
}