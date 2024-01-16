<?php

namespace App\Service\Concretes;
use App\Http\Requests\CategoryRequest\CategoryRequest;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Service\Interfaces\ICategoryService;

class CategoryManager implements ICategoryService
{
    protected ICategoryRepository $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

        public function createOneCategory(CategoryRequest $categoryRequest)
        {
            return $this->categoryRepository->createOneCategory($categoryRequest);
        }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById(int $id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }
}
