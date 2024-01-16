<?php

namespace App\Service\Concretes;

use App\Http\Requests\TodoRequest\TodoCompletedRequest;
use App\Http\Requests\TodoRequest\TodoRequest;
use App\Repositories\Interfaces\ITodoRepository;
use App\Service\Interfaces\ITodosService;

class TodosManager implements ITodosService
{

    protected ITodoRepository $todoRepository;

    public function __construct(ITodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }



    public function createOnePost(TodoRequest $todoRequest)
    {
        return $this->todoRepository->createOnePost($todoRequest);
    }

    public function getAllTodos( $userId,$categoryId)
    {
        return $this->todoRepository->getAllTodos($userId,$categoryId);
    }

    public function completed(TodoCompletedRequest $todoCompletedRequest, int $id)
    {
        return $this->todoRepository->completed($todoCompletedRequest,$id);
    }

    public function deletedOneById(int $id)
    {
        return $this->todoRepository->deletedOneById($id);
    }

    public function getByDateSortingAsc(int $userId)
    {
        return $this->todoRepository->getByDateSortingAsc($userId);
    }

    public function getByDateSortingDesc(int $userId)
    {
        return $this->todoRepository->getByDateSortingDesc($userId);
    }

    public function getByPrioritySortingAsc(int $userId)
    {
        return $this->todoRepository->getByPrioritySortingAsc($userId);
    }

    public function filterTasks(int $id, mixed $date, mixed $priority)
    {
        return $this->todoRepository->filterTasks($id,$date,$priority);
    }
}
