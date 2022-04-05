<?php

namespace App\Repositories;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;

class DiscountRepository
{
	private $model;

	public function __construct(Discount $model)
	{
		$this->model = $model;
	}

	public function createDiscount(DiscountRequest $request)
	{
		$discount = $this->model->create($request->input());
		return $discount;
	}

	public function getDiscounts($perPage)
	{
		return $this->model->with('products')->paginate($perPage);
	}

	public function getDiscountById($id)
	{
		return $this->model->find($id);
	}

	public function updateDiscount(DiscountRequest $request, $id)
	{
		$discount = $this->model->find($id);
        $discount ? $discount->update($request) : $discount = null;
        return $discount;
	}

	public function deleteDiscount($id)
	{
		$discount = $this->model->find($id);
		$discount ? $discount->delete() : $discount = null;
		return $discount;
	}

}