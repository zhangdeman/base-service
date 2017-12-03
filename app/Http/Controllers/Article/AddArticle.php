<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/3
 * Time: 19:24
 */
namespace App\Http\Controllers\Article;
use App\Dao\ArticleDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;

class AddArticle extends Controller
{
    public function __construct()
    {
    }

    public function createArticle(Request $request)
    {
        $data = array(
            'id'        =>  $request->input('id'),
            'admin_id'  =>  $request->input('admin_id'),
            'create_ip' =>  $request->input('create_ip'),
            'html_content'=>  $request->input('plain_content'),
            'text_content' => $request->input('text_content'),
            'son_kind'  =>  $request->input('son_kind'),
            'parent_kind' => $request->input('parent_kind'),
        );

        $addResult = ArticleDao::addArticle($data);
        if (empty($addResult)) {
            $this->error(Out::ERROR_ADD_ARTICLE_FAIL);
        }
        $this->success(array('article_id' => $data['id']));
    }
}