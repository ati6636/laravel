<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting = Setting::first();
        return view('home.index',['setting' => $setting, 'page'=> 'home']);
    }

    public function about()
    {
        $setting = Setting::first();
        return view('home.about', compact('setting'));
    }

    public function referances()
    {
        $setting = Setting::first();
        return view('home.referances', compact('setting'));
    }

    public function faq()
    {
        return view('home.faq');
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', compact('setting'));
    }

    public function login()
    {
        return view('home.login');
    }

    public function loginCheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');
        }
        return view('home');
    }

}
