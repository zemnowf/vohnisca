<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCampaignForm;
use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::orderBy('created_at', 'desc')->paginate(2);
        return view('campaigns.index', [
            'campaigns' => $campaigns
        ]);
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.show', [
            'campaign' => $campaign
        ]);
    }

    public function showCreateNewCampaign()
    {
        return view('campaigns.create-new-campaign');
    }

    public function createNewCampaign(NewCampaignForm $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('preview_image') && $request->file('preview_image')->isValid()) {
            $path = Storage::disk('public')->putFile('images', $request->file('preview_image'));
            $validated['preview_image'] = 'storage/' . $path;
        }

        $campaign = Campaign::create($validated);
        return redirect(route('campaigns.show', ['campaign' => $campaign]));
    }

    public function showStartNewCampaign($id)
    {
        return view('campaigns.start-new-campaign', [
            'id' => $id
        ]);
    }
}
