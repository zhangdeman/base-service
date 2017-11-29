<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/25
 * Time: 11:32
 * 请求接口的配置文件
 */

return [
    'base'  =>  array(
        'app_id'    =>  '5b82978c16585a7e4ab54d40b6f15089',
        'salt'      =>  'REQUEST_BASE_SERVICE_SALT',
        'protocol'  =>  'http',
        'ip'        =>  '127.0.0.1',
        'port'      =>  '8888',
    ),

    //添加管理员
    'add_admin' =>  array(
        'uri'   =>  '/api/admin/addAdmin',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2
    ),
];