<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService
{
  public function findAll()
  {
    return Product::where('user_id', Auth::id())->with("category")->get();
  }

  public function findById($id)
  {
    return Product::where('id', $id)
      ->where('user_id', Auth::id())
      ->with('category')
      ->firstOrFail();
  }

  public function create(StoreProductRequest $request)
  {
    $validatedRequest = $request->validated();

    $imagePath = null;
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagePath = $image->store('public/images'); // Store the image in the 'public/images' directory
    }

    return Product::create([
      "name" => $validatedRequest["name"],
      "price" => $validatedRequest["price"],
      "product_category_id" => $validatedRequest["product_category_id"],
      "user_id" => Auth::id(),
      "image" => $imagePath
    ]);
  }

  public function updateById(UpdateProductRequest $request, $id)
  {
    $foundProduct = $this->findById($id);

    $validatedRequest = $request->validated();
    if ($request->hasFile('image')) {
      if ($foundProduct->image) {
        Storage::delete($foundProduct->image);
      }

      $image = $request->file('image');
      $imagePath = $image->store('public/images');
      $validatedRequest['image'] = $imagePath;
    }
    $merged = array_merge($foundProduct->toArray(), $validatedRequest);

    $foundProduct->update($merged);

    return $foundProduct;
  }

  public function deleteById($id)
  {
    $this->findById($id)->delete();
  }
}
