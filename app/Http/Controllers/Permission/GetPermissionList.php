<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/23
 * Time: 18:26
 */
namespace App\Http\Controllers\Permission;

use App\Dao\PermissionDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetPermissionList extends Controller
{
    public function __construct()
    {
    }

    public function getList(Request $request)
    {
        $where = array();

        $currentPage = $request->input('current_page', 1);
        $pageLimit = $request->input('page_limit', 20);
        $status = $request->input('status', null);
        $parentId = $request->input('parent_id', null);
        $orderField = $request->input('order_field', 'create_time');
        $orderRule = $request->input('order_rule', 'DESC');
        if (!is_null($status)) {
            $where['status'] = $status;
        }
        if (!is_null($parentId)) {
            $where['parent_id'] = $parentId;
        }

        $offset = ($currentPage - 1) * $pageLimit;

        $list = PermissionDao::getPermissionList($where, $orderField, $orderRule, $pageLimit, $offset);
        $listCount = PermissionDao::getPermissionCount($where);

        $returnData =array(
            'list'          =>  $list,
            'count'         =>  $listCount,
            'current_page'  => $currentPage,
            'page_limit'    =>  $pageLimit,
            'total_page'    =>  ceil($listCount/$pageLimit),
        );

        $this->success($returnData);
    }
}