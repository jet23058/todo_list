<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Todo\StoreInfo;
use App\Http\Requests\Todo\Show;
use App\Http\Requests\Todo\Update;
use App\Http\Requests\Todo\Destory;
use App\Http\Resources\Todo\ListResource;
use App\Http\Resources\Todo\ShowResource;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TodoAPIController extends BaseController
{
    private $service;

    public function __construct(TodoService $todoService)
    {
        $this->service = $todoService;
    }

    /**
     * get all to-do lists
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data = ListResource::collection($this->service->lists());
        return response()->success($data, trans('todo_list.success.index'));
    }

    /**
     * get one to-do list
     *
     * @return Response
     */
    public function show(string $id, Show $request)
    {
        $data = new ShowResource($this->service->get($id));
        return response()->success($data, trans('todo_list.success.show'));
    }

    /**
     * create one to-do list
     *
     * @return Response
     */
    public function store(StoreInfo $request)
    {
        $result = $this->service->store($request->all());
        return response()->success([], trans('todo_list.success.store'));
    }

    /**
     * update one to-do list
     *
     * @return Response
     */
    public function update(string $id, Update $request)
    {
        $result = $this->service->update($id, $request->all());
        return response()->success([], trans('todo_list.success.update'));
    }

    /**
     * delete one to-do list
     *
     * @return Response
     */
    public function destroy(string $id, Destory $request)
    {
        $result = $this->service->destory($id);
        return response()->success([], trans('todo_list.success.destory'));
    }

    /**
     * delete all to-do list
     *
     * @return Response
     */
    public function deleteAll()
    {
        $result = $this->service->deleteAll();
        return response()->success([], trans('todo_list.success.destory'));
    }
}
