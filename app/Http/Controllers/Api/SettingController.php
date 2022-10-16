<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit(Request $request)
    {
        $setting = Setting::where('id',$request->id)->get();
        return response()->json($setting);
    }

    public function update(Request $request, Setting $Setting)
    {
        $Setting->site_name_en = $request ->site_name_en ;
        $Setting->site_name_ar = $request->site_name_ar ;
        $Setting->site_title_en = $request-> site_title_en;
        $Setting->site_title_ar = $request->site_title_ar ;
        $Setting->title_desc_en = $request->title_desc_en ;
        $Setting->title_desc_ar = $request->title_desc_ar ;
        $Setting->about_us_en = $request->about_us_en ;
        $Setting->about_us_ar = $request->about_us_ar ;
        $Setting->address_en = $request->address_en ;
        $Setting->address_ar = $request->address_ar ;
        $Setting-> phone_en= $request->phone_en ;
        $Setting->phone_ar = $request->phone_ar ;
        $Setting-> email= $request->email ;
        $Setting ->save();
        if($Setting){
            return"data";
        }else{
            return "no";
        }
        
    }
}
