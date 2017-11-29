<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/24
 * Time: 23:46
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Themis\Api\Out;
use App\Dao\AdminDao;
class Add extends Controller
{
    public function __construct()
    {

    }

    public function addAdmin(Request $request)
    {
        $params = $request->all();

        $result = AdminDao::addAdmin($params);
        $params['result'] = $result;
        $this->success($params);
    }

    /**
     * 验证参数
     * @param Request $request
     * @return array
     */
    private function _validateParam(Request $request)
    {
        $validateRule = [
            'id'    =>  'required',
            'phone' =>  'required',
            'mail'  =>  'required',
            'role'  =>  'required',
            'password' => 'required',
        ];
        $validateResult = $this->validate($request, $validateRule);
        if (empty($validateResult)) {
            $this->error(Out::ERROR_PARAMS_ERROR,'', $validateResult);
        }
        return $validateResult;
    }
}