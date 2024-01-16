<?php

namespace App\Repositories\Interfaces;
use App\Http\Requests\TodoRequest\TodoRequest;
use App\Http\Requests\TodoRequest\TodoCompletedRequest ;
interface ITodoRepository
{
    public function createOnePost(TodoRequest $todoRequest);

    public function getalltodos($userId,$categoryId);

    public function completed(TodoCompletedRequest $todoCompletedRequest, int $id);

    public function deletedOneById(int $id);

    public function getByDateSortingAsc(int $userId);

    public function getByDateSortingDesc(int $userId);

    public function getByPrioritySortingAsc(int $userId);

    public function filterTasks(int $id, mixed $date, mixed $priority);

}
