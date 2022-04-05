<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Repositories\CampaignRepository;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    private $repository;
    private $notFound = 'Campanha não encontrada';

    public function __construct(CampaignRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCampaign(CampaignRequest $request)
    {
        $campaign = $this->repository->createCampaign($request);
        return response()->json(['succes' => 'true', 'data' => $campaign], 201);
    }

    public function getCampaigns(Request $request)
    {
        $perPage = $request->input('perPage', 10);
    	$campaigns = $this->repository->getCampaigns($perPage);
        return response()->json($campaigns, 200);
    }

    public function getCampaignById($id)
    {
        $campaign = $this->repository->getCampaignById($id);
        return $campaign ?
            response()->json(['succes' => 'true', 'data' => $campaign], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
    }

    public function updateCampaign(CampaignRequest $request, $id)
	{
        $campaign = $this->repository->updateCampaign($request, $id);
		return $campaign ?
            response()->json(['succes' => 'true', 'data' => $campaign], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}

    public function deleteCampaign($id)
	{
        $campaign = $this->repository->deleteCampaign($id);
        return $campaign ?
            response()->json(['succes' => 'true', 'data' => $campaign], 200) :
            response()->json(['succes' => 'false', 'data' => ['message' => $this->notFound]], 404);
	}
}
