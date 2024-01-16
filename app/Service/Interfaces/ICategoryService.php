<?php

namespace App\Service\Interfaces;

use App\Http\Requests\CategoryRequest\CategoryRequest;

interface ICategoryService
{
    public function createOneCategory(CategoryRequest $categoryRequest);

    public function getAll();

    public function getCategoryById(int $id);


}
