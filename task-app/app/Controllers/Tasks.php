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
        return view('Tasks/new', [
            'task' => ['description' => '']
        ]);
    }

    public function create()
    {
        $model = new \App\Models\TaskModel;

        $result = $model->insert([
            'description' => $this->request->getPost("description")
        ]);

        if ($result === false) {
            // dd($model->errors());
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        } else {
            return redirect()->to("/tasks/show/$result")
                ->with('info', 'Task created successfully');
        }
    }

    public function edit($id)
    {
        $model = new \App\Models\TaskModel;

        $task = $model->find($id);

        return view('Tasks/edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $model = new \App\Models\TaskModel;

        $result = $model->update($id, [
            'description' => $this->request->getPost('description')
        ]);

        if ($result) {
            return redirect()->to("/tasks/show/$id")
                ->with('info', 'Task updated successfully');
        } else {
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        }
    }
}
