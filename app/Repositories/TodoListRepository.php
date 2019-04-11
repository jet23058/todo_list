<?php

namespace App\Repositories;

use App\Models\TodoList; 

class TodoListRepository
{
    public function model()
    {
        return "App\\Models\\TodoList";
    }

    public function check(): bool
    {
        $count = TodoList::where('user_id', request()->user()->id)->where('id', request()->route('to_do'))->count();
        return $count > 0;
    }

    public function lists()
    {
        return TodoList::all();
    }

    public function get(string $id): TodoList
    {
        return TodoList::find($id);
    }

    public function store(array $data): bool
    {
        $data['user_id'] = request()->user()->id;
        $model = new TodoList;
        $model->fill($data);
        return $model->save();
    }
    
    public function update(string $id, array $data): bool
    {
        $model = TodoList::find($id);
        $model->fill($data);
        return $model->save();
    }
    
    public function destory(string $id): bool
    {
        $model = TodoList::find($id);
        return $model->delete();
    }
    
    public function deleteAll(): bool
    {
        $model = TodoList::where('user_id', request()->user()->id);
        return $model->delete();
    }
}