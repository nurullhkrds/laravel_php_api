<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest\CategoryRequest;
use App\Service\Interfaces\ICategoryService;

class CategoriesController extends Controller
{
    //
    protected ICategoryService $categoryService;


    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }




    public function create(CategoryRequest $categoryRequest)
    {
        return $this->categoryService->createOneCategory($categoryRequest);
    }


    public function getAll()
    {
        return $this->categoryService->getAll();
    }


    public function getCategoryById(int $id)
    {
        return $this->categoryService->getCategoryById($id);
    }

}
