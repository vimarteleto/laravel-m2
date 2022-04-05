<?php

namespace App\Repositories;

use App\Http\Requests\GroupRequest;
use App\Models\Group;

class GroupRepository
{
	private $model;

	public function __construct(Group $model)
	{
		$this->model = $model;
	}

	public function createGroup(GroupRequest $request)
	{
		$group = $this->model->create($request->input());
		return $group;
	}

	public function getGroups($perPage)
	{
		return $this->model->with('cities', 'campaign')->paginate($perPage);
	}

	public function getGroupById($id)
	{
		return $this->model->find($id);
	}

	public function updateGroup(GroupRequest $request, $id)
	{
		$group = $this->model->find($id);
        $group ? $group->update($request->input()) : $group = null;
        return $group;
	}

	public function deleteGroup($id)
	{
		$group = $this->model->find($id);
		$group ? $group->delete() : $group = null;
		return $group;
	}

}