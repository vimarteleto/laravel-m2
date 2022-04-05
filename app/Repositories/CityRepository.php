<?php

namespace App\Repositories;

use App\Http\Requests\CityRequest;
use App\Models\City;

class CityRepository
{
	private $model;

	public function __construct(City $model)
	{
		$this->model = $model;
	}

	public function createCity(CityRequest $request)
	{
		$city = $this->model->create($request);
		return $city;
	}

	public function getCities($perPage)
	{
		return $this->model->with('group')->paginate($perPage);
	}

	public function getCityById($id)
	{
		return $this->model->find($id);
	}

	public function updateCity(CityRequest $request, $id)
	{
		$city = $this->model->find($id);
        $city ? $city->update($request) : $city = null;
        return $city;
	}

	public function deleteCity($id)
	{
		$city = $this->model->find($id);
		$city ? $city->delete() : $city = null;
		return $city;
	}

}