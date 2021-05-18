<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Banner;
use App\ProudMemeber;
use App\Gallery;
use App\Statistic;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome',['posts' => Post::where('lang', $this->getLang())->limit(3)->orderby('created_at','desc')->get(),
        'categories' => Category::where('lang', $this->getLang())->paginate(12),
        'banners' => Banner::where('lang', $this->getLang())->limit(3)->orderby('created_at','desc')->get(),
        'galleries' => Gallery::where('lang', $this->getLang())->limit(3)->orderby('created_at','desc')->get(),
        'statistics' => Statistic::where('lang', $this->getLang())->limit(3)->orderby('created_at','desc')->get(),
        'proud_memebers'=>ProudMemeber::where('lang', $this->getLang())->limit(5)->orderby('created_at','desc')->get(),
        ]
        );
    }

    private function getLang()
    {
        if (!isset($_COOKIE['language'])) {
            return 'uz';
        }
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
    }
}
