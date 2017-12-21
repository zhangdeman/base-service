<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 17/12/21
 * Time: 11:01
 */
namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dao\ArticleKindDao;
use Themis\Api\Out;

class UpdateArticleKind extends Controller
{
    public function __construct()
    {
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $parentId = $request->input('parent_id');
        $kindDetail = ArticleKindDao::getArticleKindById($id);

        if (empty($kindDetail)) {
            $this->error(Out::ERROR_EMPTY_KIND_DETAIL);
        }

        if ($title == $kindDetail->title && $parentId == $kindDetail->parent_id) {
            //数据没有变化,直接返回成功
            $this->success(array('title' => $kindDetail->title, 'parent_id' => $kindDetail->parent_id));
        }

        $updateData = array(
            'title' =>  $title,
            'parent_id' =>  $parentId
        );

        $updateResult = ArticleKindDao::updateArticleKindById($id, $updateData);

        if ($updateResult) {
            $this->success($updateData);
        } else {
            $this->error(Out::ERROR_UPDATE_KIND_FAIL);
        }
    }
}