<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        // 模擬從資料庫拿到的資料
        $data = [
            ['id' => 1, 'description' => 'First task'],
            ['id' => 2, 'description' => 'Second task'],
        ];

        // 第二個參數關聯式陣列, 傳到 View 之後 key 會等於變數名稱
        echo view("Tasks/index", ['tasks' => $data]);
    }
}
