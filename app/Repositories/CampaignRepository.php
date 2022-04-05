<?php

namespace App\Repositories;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;

class CampaignRepository
{
	private $model;

	public function __construct(Campaign $model)
	{
		$this->model = $model;
	}

	public function createCampaign(CampaignRequest $request)
	{
		$campaign = $this->model->create($request);
		return $campaign;
	}

	public function getCampaigns()
	{
		return $this->model->with('groups', 'products')->paginate();
	}

	public function getCampaignById($id)
	{
		return $this->model->find($id);
	}

	public function updateCampaign(CampaignRequest $request, $id)
	{
		$campaign = $this->model->find($id);
        $campaign ? $campaign->update($request) : $campaign = null;
        return $campaign;
	}

	public function deleteCampaign($id)
	{
		$campaign = $this->model->find($id);
		$campaign ? $campaign->delete() : $campaign = null;
		return $campaign;
	}

}