<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/21
 * Time: 22:16
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function testInterface(Request $request)
    {
        echo json_encode(array('name' => 'zhangdeman'));
    }
}