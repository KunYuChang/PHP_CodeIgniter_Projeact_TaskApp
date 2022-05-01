<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TaskModel;
        $data = $model->findAll();

        // 第二個參數關聯式陣列, 傳到 View 之後 key 會等於變數名稱
        echo view("Tasks/index", ['tasks' => $data]);
    }

    public function show($id)
    {
        $model = new \App\Models\TaskModel;
        $task = $model->find($id);

        // dd($task);

        return view('Tasks/show', [
            'task' => $task
        ]);
    }

    public function new()
    {
        return view('Tasks/new');
    }

    public function create()
    {
        $model = new \App\Models\TaskModel;

        $model->insert([
            'description' => $this->request->getPost("description")
        ]);

        dd($model->insertID);
    }
}
