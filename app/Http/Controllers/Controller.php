<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data, $isQuit = true)
    {
        $returnData = array(
            'error_code'    => 0,
            'error_msg'     =>  'success',
            'data'          =>  $data
        );
        echo json_encode($returnData);
        if ($isQuit) {
            exit(0);
        }

        //完成请求提前返回，但可以继续后续逻辑
        fastcgi_finish_request();
    }

    public function error($errorCode, $errorMsg = '', $errorData = array(), $isQuit = true)
    {}
}
