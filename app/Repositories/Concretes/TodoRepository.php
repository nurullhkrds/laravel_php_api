<?php

namespace App\Repositories\Concretes;

use App\Http\Requests\TodoRequest\TodoCompletedRequest;
use App\Http\Requests\TodoRequest\TodoRequest;
use App\Models\Todo;
use App\Repositories\Interfaces\ITodoRepository;
use Carbon\Carbon;

class TodoRepository implements ITodoRepository
{
    protected Todo $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }


    public function createOnePost(TodoRequest $todoRequest)
    {
        $this->todo->create([
            'title' => $todoRequest->title,
            'description' => $todoRequest->description,
            'user_id' => $todoRequest->user_id,
            'category_id' => $todoRequest->category_id,
            'priorityLevel' => $todoRequest->priorityLevel,
            'dateLast' => Carbon::parse($todoRequest->date), // Tarih ve saat verisini parse edin
            'dateLastFiltered' => Carbon::parse($todoRequest->date)->format('Y-m-d'), // Belirli bir formata dönüştürün
            'isCompleted' => false,
            'dateCreated' => Carbon::now(), // Şu anki tarihi ve saati alın

        ]);
        return $todoRequest;

    }

    public function getAllTodos($userId,$categoryId)
    {

        $query = $this->todo->query();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $todoAll = $query->get();

        return $todoAll;
    }


    public function completed(TodoCompletedRequest $todoCompletedRequest, int $id)
    {
        $todo = $this->todo->find($id);
        $todo->isCompleted = $todoCompletedRequest->completed;
        $todo->save();
        return $todo;
    }

    public function deletedOneById(int $id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        return $todo;
    }

    public function getByDateSortingAsc(int $userId)
    {
        $todoAll = $this->todo->where('user_id', $userId)->orderBy('dateLastFiltered', 'asc')->get();
        return $todoAll;
    }

    public function getByDateSortingDesc(int $userId)
    {
        $todoAll = $this->todo->where('user_id', $userId)->orderBy('dateLastFiltered', 'desc')->get();
        return $todoAll;
    }

    public function getByPrioritySortingAsc(int $userId)
    {
        $todoAll = $this->todo->where('user_id', $userId)->orderBy('priorityLevel', 'asc')->get();
        return $todoAll;
    }

    public function filterTasks(int $id, mixed $date, mixed $priority)
    {
        $query = $this->todo->where('user_id', $id);

        if ($date) {
            $query->where('dateLastFiltered', $date);
        }

        if ($priority) {
            $query->where('priorityLevel', $priority);
        }

        $todoAll = $query->get();

        return $todoAll;
    }
}
