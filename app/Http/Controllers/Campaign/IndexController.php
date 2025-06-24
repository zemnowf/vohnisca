<?php

namespace App\Http\Controllers\Campaign;

use App\Actions\StoreImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\NewCampaignForm;
use App\Models\Campaign;

class IndexController extends Controller
{
    public function __construct(
        protected StoreImageAction $storeImageAction,
    ) {}

    public function __invoke()
    {
        $perPage = request()->input('perPage', 3);
        $campaigns = Campaign::orderBy('created_at', 'desc')->paginate($perPage);
        return $campaigns;
    }
}
