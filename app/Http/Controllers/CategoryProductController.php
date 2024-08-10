<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Services\CategoryProductService;

class CategoryProductController extends Controller
{
    protected $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->categoryProductService->findAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryProductRequest $request)
    {
        return response()->json($this->categoryProductService->create($request), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->categoryProductService->findById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryProductRequest  $request
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryProductRequest $request, $id)
    {
        return response()->json($this->categoryProductService->updateById($request, $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryProductService->deleteById($id);
        return response()->noContent();
    }
}
