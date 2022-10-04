<?php

namespace App\Http\Controllers;
use App\Models\Viewer;
use App\Events\ViewerEvent;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    public function getNumberOfViewers()
    {
        $viewer = Viewer::first();
        event(new ViewerEvent($viewer));
        return view('dashboard.pages.number_of_viewers',compact('viewer'));
    }
}
