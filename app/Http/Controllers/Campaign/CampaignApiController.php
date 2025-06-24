<?php

namespace App\Http\Controllers\Campaign;

use App\Actions\StoreImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\NewCampaignForm;
use App\Models\Campaign;
use App\Models\User;


class CampaignApiController extends Controller
{
    public function getById ()
    {
        $campaignId = request()->input('id');
        $campaign = Campaign::findOrFail($campaignId);
        $campaign['updatedAtFormatted'] = $campaign->updated_at->format('d M Y');
        $campaign['createdAtFormatted'] = $campaign->created_at->format('d M Y');
        $author = User::findOrFail($campaign->user_id);
        $campaign['author'] = $author;
        return $campaign;
    }
}
