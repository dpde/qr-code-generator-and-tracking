<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorTracking;
use App\Models\TargetPage;

class RedirectController extends Controller
{
    public function trackAndRedirect(Request $request, TargetPage $targetPage)
    {
        $trackingData = [
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'referer' => $request->header('Referer'),
            'target_page_id' => $targetPage->id,
        ];
        
        VisitorTracking::create($trackingData);
        
        return redirect()->away($targetPage->url);
    }
}