<?php

namespace App\Repositories\Concretes;
use App\Http\Requests\CategoryRequest\CategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category= $category;
    }


    public function createOneCategory(CategoryRequest $categoryRequest){
        Category::create([
            'name'=>$categoryRequest->name,
        ]);
        return $categoryRequest;
    }


    public function getAll()
    {
        $allData=Category::all();
        return $allData;

    }

    public function getCategoryById(int $id)
    {
        $category=Category::find($id);
        return $category;
    }
}
