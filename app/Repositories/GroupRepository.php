<?php

namespace App\Repositories;

use App\Http\Requests\Appointment\RegisterGroupRequest;
use App\Http\Requests\Appointment\UpdateGroupRequest;
use App\Models\Group;

class GroupRepository
{
	private $model;

	public function __construct(Group $model)
	{
		$this->model = $model;
	}

	public function create(RegisterGroupRequest $request)
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

	public function getGroupById($id)
	{
		return $this->model->find($id);
	}

	public function updateCty(UpdateGroupRequest $request, $id)
	{
		$city = $this->model->find($id);

        $request = $request->only('name', 'group_id');
        $city ? $city->update($request) : $city = null;
        return $city;
	}

	public function deleteGroup($id)
	{
		$appointment = $this->model->find($id);
		$appointment ? $appointment->delete() : $appointment = null;
		return $appointment;
	}

}