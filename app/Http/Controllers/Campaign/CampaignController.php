<?php

namespace App\Http\Controllers\Campaign;

use App\Actions\StoreImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\NewCampaignForm;
use App\Models\Campaign;


class CampaignController extends Controller
{

    public function __construct(
        protected StoreImageAction $storeImageAction,
    ) {}

    public function index()
    {
        return view('campaigns.index');
    }

    public function getCampaigns()
    {
        $perPage = request()->input('perPage', 3);
        $campaigns = Campaign::orderBy('created_at', 'desc')->paginate($perPage);
        return $campaigns;
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.show', [
            'campaign' => $campaign
        ]);
    }

    public function createNewCampaign(NewCampaignForm $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('preview_image')) {
            $validatedData['preview_image'] = $this->storeImageAction->execute(
                $request->file('preview_image')
            );
        }

        $campaign = Campaign::create($validatedData);
        return redirect(route('campaigns.show', ['campaign' => $campaign]));
    }
}
