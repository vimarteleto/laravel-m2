<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $repository;
    private $notFound = 'Grupo não encontrado';

    public function __construct(GroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createGroup(GroupRequest $request)
    {
        $group = $this->repository->createGroup($request);
        return response()->json(['succes' => 'true', 'data' => $group], 201);
    }

    public function getGroups(Request $request)
    {
        $perPage = $request->input('perPage', 10);
    	$groups = $this->repository->getGroups($perPage);
        return response()->json($groups, 200);
    }

    public function getGroupById($id)
    {
        $group = $this->repository->getGroupById($id);
        return $group ?
            response()->json(['succes' => 'true', 'data' => $group], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
    }

    public function updateGroup(GroupRequest $request, $id)
	{
        $group = $this->repository->updateGroup($request, $id);
		return $group ?
            response()->json(['succes' => 'true', 'data' => $group], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}

    public function deleteGroup($id)
	{
        $group = $this->repository->deleteGroup($id);
        return $group ?
            response()->json(['succes' => 'true', 'data' => $group], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}
}
