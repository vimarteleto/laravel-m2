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

	public function create(CityRequest $request)
	{
		$city = $this->model->create([
			'name' => $request->name,
			'group_id' => $request->group_id,
		]);
		return $city;
	}

	public function getCities()
	{
		return $this->model->with('group')->get();
	}

	public function getCityById($id)
	{
		return $this->model->find($id);
	}

	public function updateCty(CityRequest $request, $id)
	{
		$city = $this->model->find($id);
        $city ? $city->update($request) : $city = null;
        return $city;
	}

	public function deleteCity($id)
	{
		$appointment = $this->model->find($id);
		$appointment ? $appointment->delete() : $appointment = null;
		return $appointment;
	}

}