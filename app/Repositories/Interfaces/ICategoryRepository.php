<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CategoryRequest\CategoryRequest;

interface ICategoryRepository
{
    public function createOneCategory(CategoryRequest $categoryRequest);

    public function getAll();

    public function getCategoryById(int $id);


}
