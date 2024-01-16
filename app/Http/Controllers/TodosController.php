<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest\TodoCompletedRequest;
use App\Http\Requests\TodoRequest\TodoRequest;
use App\Service\Interfaces\ITodosService;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    protected ITodosService $todosService;

    public function __construct(ITodosService $todosService)
    {
        $this->todosService = $todosService;
    }

    public function createOnePost(TodoRequest $todoRequest)
    {
        return $this->todosService->createOnePost($todoRequest);
    }

    public function getAllTodos(Request $request)
    {
        $userId=$request->input('userId');
        $categoryId=$request->input('categoryId');

        return $this->todosService->getAllTodos($userId,$categoryId);
    }

    public function completed(TodoCompletedRequest $todoCompletedRequest,int $id)
    {
        return $this->todosService->completed($todoCompletedRequest,$id);
    }

    public function deletedOneById(int $id)
    {
        return $this->todosService->deletedOneById($id);
    }

    public function getByDateSortingAsc(Request $request)
    {
        $userId=$request->input('userId');
        return $this->todosService->getByDateSortingAsc($userId);
    }

    public function getByDateSortingDesc(Request $request)
    {
        $userId=$request->input('userId');
        return $this->todosService->getByDateSortingDesc($userId);
    }

    public function getByPrioritySortingAsc(Request $request)
    {
        $userId=$request->input('userId');
        return $this->todosService->getByPrioritySortingAsc($userId);
    }

    public function filterTasks(int $id,Request $request)
    {
        $date=$request->input('date');
        $priority=$request->input('priority');

        return $this->todosService->filterTasks($id,$date,$priority);
    }
}
