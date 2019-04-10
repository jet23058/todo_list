<?php

namespace App\Services;

use App\Repositories\TodoListRepository;

class TodoService
{
    public function __construct(TodoListRepository $repository)
    {
        $this->repository = $repository;
    }

    public function lists()
    {
        return $this->repository->lists();
    }

    public function get(string $id)
    {
        return $this->repository->get($id);
    }

    public function store(array $data)
    {
        return $this->repository->store($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destory(string $id)
    {
        return $this->repository->destory($id);
    }

    public function deleteAll()
    {
        return $this->repository->deleteAll();
    }

    public static function transDoneAt($doneAt): ?string
    {
        return is_null($doneAt) ? null : dateFormat($doneAt);
    }

    public static function transStatus($doneAt): string
    {
        return is_null($doneAt) ? \App\Models\TodoList::UNDONE : \App\Models\TodoList::DONE;
    }
}
