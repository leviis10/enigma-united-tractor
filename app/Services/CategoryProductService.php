<?php

namespace App\Services;

use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Models\CategoryProduct;

class CategoryProductService
{
  public function findAll()
  {
    return CategoryProduct::all();
  }

  public function findById($id)
  {
    return CategoryProduct::findOrFail($id);
  }

  public function create(StoreCategoryProductRequest $request)
  {
    return CategoryProduct::create($request->validated());
  }

  public function updateById(UpdateCategoryProductRequest $request, $id)
  {
    $foundCategoryProduct = $this->findById($id);
    $validatedRequest = $request->validated();
    $foundCategoryProduct->update($validatedRequest);
    return $foundCategoryProduct;
  }

  public function deleteById($id)
  {
    $this->findById($id)->delete();
  }
}
