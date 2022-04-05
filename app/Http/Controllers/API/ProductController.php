<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $repository;
    private $notFound = 'Produto não encontrado';

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createProduct(ProductRequest $request)
    {
        $product = $this->repository->createProduct($request);
        return response()->json(['succes' => 'true', 'data' => $product], 201);
    }

    public function getProducts(Request $request)
    {
        $perPage = $request->input('perPage', 10);
    	$products = $this->repository->getProducts($perPage);
        return response()->json($products, 200);
    }

    public function getProductById($id)
    {
        $product = $this->repository->getProductById($id);
        return $product ?
            response()->json(['succes' => 'true', 'data' => $product], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
    }

    public function updateProduct(ProductRequest $request, $id)
	{
        $product = $this->repository->updateProduct($request, $id);
		return $product ?
            response()->json(['succes' => 'true', 'data' => $product], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}

    public function deleteProduct($id)
	{
        $product = $this->repository->deleteProduct($id);
        return $product ?
            response()->json(['succes' => 'true', 'data' => $product], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}
}
