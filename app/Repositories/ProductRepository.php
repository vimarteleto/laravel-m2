<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductRepository
{
	private $model;

	public function __construct(Product $model)
	{
		$this->model = $model;
	}

	public function createProduct(ProductRequest $request)
	{
		$product = $this->model->create($request->input());
		return $product;
	}

	public function getProducts($perPage)
	{
		return $this->model->with('campaign', 'discount')->paginate($perPage);
	}

	public function getProductById($id)
	{
		$product = $this->model->with('campaign', 'discount')->find($id);
		$discountAmount = $product->price * ($product->discount->percentage / 100);
		$newPrice =  $product->price - $discountAmount;
		$product->push($newPrice);

		return $product;
	}

	public function updateProduct(ProductRequest $request, $id)
	{
		$product = $this->model->find($id);
        $product ? $product->update($request->input()) : $product = null;
        return $product;
	}

	public function deleteProduct($id)
	{
		$product = $this->model->find($id);
		$product ? $product->delete() : $product = null;
		return $product;
	}

}