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
use Themis\Article\ArticleKind;

class DeleteArticleKind extends Controller
{
    public function __construct()
    {
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $kindDetail = ArticleKindDao::getArticleKindById($id);

        if (empty($kindDetail)) {
            $this->error(Out::ERROR_EMPTY_KIND_DETAIL);
        }

        if (ArticleKind::KIND_STATUS_DELETE == $kindDetail['status']) {
            //已是删除状态，直接返回成功
            $this->success(array('id' => $kindDetail['id']));
        }

        $updateData = array(
            'status'    =>  ArticleKind::KIND_STATUS_DELETE
        );

        $updateResult = ArticleKindDao::updateArticleKindById($id, $updateData);

        if ($updateResult) {
            $this->success(array('id' => $kindDetail['id']));
        } else {
            $this->error(Out::ERROR_DELETE_KIND_FAIL);
        }
    }
}