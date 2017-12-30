<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/30
 * Time: 16:56
 */
namespace App\Http\Controllers\Admin;
use App\Dao\AdminDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetAdminList extends Controller
{
    public function __construct()
    {
    }

    /**
     * 获取管理员列表
     * @param Request $request
     */
    public function getAdminList(Request $request)
    {
        $where = array();
        $id = $request->input('id', null);
        if (!is_null($id)) {
            $where['id'] = explode(',', $id);
        }

        $currentPage = $request->input('current_page', 1);
        $pageLimit = $request->input('page_limit', 20);
        $orderField = $request->input('order_field', 'create_time');
        $orderRule = $request->input('order_rule', 'DESC');
        $offset = ($currentPage - 1) * $pageLimit;
        $list = AdminDao::getAdminList($where, $pageLimit, $offset, $orderField, $orderRule);
        $adminCount = AdminDao::getAdminCount($where);
        $returnData = array(
            'admin_list'    =>  $list,
            'total_count'   =>  $adminCount,
            'current_page'  =>  $currentPage,
            'page_limit'    =>  $pageLimit,
            'total_page'    =>  ceil($adminCount/$pageLimit)
        );
        $this->success($returnData);
    }
}