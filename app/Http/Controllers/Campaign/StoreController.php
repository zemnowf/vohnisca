<?php

namespace App\Http\Controllers\Campaign;

use App\Actions\StoreImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\NewCampaignForm;
use App\Models\Campaign;

class StoreController extends Controller
{
    public function __construct(
        protected StoreImageAction $storeImageAction,
    ) {}

    public function __invoke(NewCampaignForm $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('preview_image')) {
            $validatedData['preview_image'] = $this->storeImageAction->execute(
                $request->file('preview_image')
            );
        }

        $campaign = Campaign::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($campaign);
        }

        return $campaign;
    }
}
