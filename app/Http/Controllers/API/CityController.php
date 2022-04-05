<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $repository;
    private $notFound = 'Cidade não encontrada';

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCity(CityRequest $request)
    {
        $city = $this->repository->createCity($request);
        return response()->json(['succes' => 'true', 'data' => $city], 201);
    }

    public function getCities(Request $request)
    {
        $perPage = $request->input('perPage', 10);
    	$cities = $this->repository->getCities($perPage);
        return response()->json($cities, 200);
    }

    public function getCityById($id)
    {
        $city = $this->repository->getCityById($id);
        return $city ?
            response()->json(['succes' => 'true', 'data' => $city], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
    }

    public function updateCity(CityRequest $request, $id)
	{
        $city = $this->repository->updateCity($request, $id);
		return $city ?
            response()->json(['succes' => 'true', 'data' => $city], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}

    public function deleteCity($id)
	{
        $city = $this->repository->deleteCity($id);
        return $city ?
            response()->json(['succes' => 'true', 'data' => $city], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}
}
