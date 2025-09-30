<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\AbilityStat;
use App\Models\AboutArea;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $banner = Banner::where('status', 1)->first();
        $about = AboutArea::where('status', 1)->first();
        $service = Service::where('status', 1)->limit(4)->latest();
        $ability = Ability::where('status', 1)->first();
        $stat = AbilityStat::first();
        return view('frontend.home.home', compact('banner', 'about', 'service', 'ability', 'stat'));
    }
}
