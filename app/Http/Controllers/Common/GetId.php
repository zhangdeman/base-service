<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/21
 * Time: 22:33
 * 获取ID信息
 */
namespace App\Http\Controllers\Common;
use App\Http\Controllers\Controller;
use App\Library\IdWorker;
use Illuminate\Http\Request;

class GetId extends Controller
{
    public function getUniqueId(Request $request)
    {
        $id = IdWorker::generateId();
        $idInfo = array(
            'id'    =>  $id,
            'time'  =>  time(),
            'ip'    =>  $request->input('request_ip')
        );
        $encodeId = encrypt($idInfo);
        $this->success(array('id' => $id, 'encode_id' => $encodeId));
    }
}