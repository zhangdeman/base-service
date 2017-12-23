<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/23
 * Time: 20:22
 */

namespace App\Http\Controllers\Permission;
use App\Dao\PermissionDao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;

class AddPermission extends Controller
{
    public function __construct()
    {
    }

    public function add(Request $request)
    {
        $requestData = array(
            'id'    =>  $request->input('create_admin_id'),
            'create_admin_id'   =>  $request->input('create_admin_id'),
            'parent_id' =>  trim($request->input('parent_id')),
            'name'  =>  trim($request->input('name')),
            'desc'  =>  trim($request->input('desc')),
            'real_controller'   =>  strtolower(trim($request->input('real_controller'))),
            'real_action'       =>  strtolower(trim($request->input('real_action'))),
            'request_uri'       =>  strtolower(trim($request->input('request_uri')))
        );

        $result = PermissionDao::add($requestData);

        if (empty($result)) {
            $this->error(Out::ERROR_ADD_PERMISSION_FAIL);
        } else {
            $this->success(array('id' => $requestData['id']));
        }
    }
}