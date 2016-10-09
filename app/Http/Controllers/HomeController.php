<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\siteTextRepository as siteTextRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(siteTextRepository $siteText)
    {
        $this->middleware('auth');
        $this->siteText = $siteText;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home')->with('headertext',$headertext)->with('frontpage_description',$frontpage_description);
    }

    /**
     * Show the front page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defaultCat = $this->siteText->loadDefault();
        $headertext = $this->siteText->loadHeader($defaultCat);
        $frontpage_description = $this->siteText->loadFront($defaultCat);

        return view('welcome')->with('headertext',$headertext)->with('frontpage_description',$frontpage_description);
    }

    /**
     * Show the about page
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $defaultCat = $this->siteText->loadDefault();
        $about = $this->siteText->loadAbout($defaultCat);

        return view('about')->with('about',$about);
    }

    /**
     * Show the rules page
     *
     * @return \Illuminate\Http\Response
     */
    public function rules()
    {
        $defaultCat = $this->siteText->loadDefault();
        $rules = $this->siteText->loadRules($defaultCat);


        return view('rules')->with('rules',$rules);
    }

    /**
     * Show the updates page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updates()
    {
        $defaultCat = $this->siteText->loadDefault();
        $updates = $this->siteText->loadUpdates($defaultCat);

        return view('updates')->with('updates',$updates);
    }

}
