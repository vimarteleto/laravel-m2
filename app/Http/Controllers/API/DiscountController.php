<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Repositories\DiscountRepository;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    private $repository;
    private $notFound = 'Disconto não encontrado';

    public function __construct(DiscountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createDiscount(DiscountRequest $request)
    {
        $discount = $this->repository->createDiscount($request);
        return response()->json(['succes' => 'true', 'data' => $discount], 201);
    }

    public function getDiscounts(Request $request)
    {
        $perPage = $request->input('perPage', 10);
    	$discounts = $this->repository->getDiscounts($perPage);
        return response()->json(['succes' => 'true', 'data' => $discounts], 200);
    }

    public function getDiscountById($id)
    {
        $discount = $this->repository->getDiscountById($id);
        return $discount ?
            response()->json(['succes' => 'true', 'data' => $discount], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
    }

    public function updateDiscount(DiscountRequest $request, $id)
	{
        $discount = $this->repository->updateDiscount($request, $id);
		return $discount ?
            response()->json(['succes' => 'true', 'data' => $discount], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}

    public function deleteDiscount($id)
	{
        $discount = $this->repository->deleteDiscount($id);
        return $discount ?
            response()->json(['succes' => 'true', 'data' => $discount], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}
}
