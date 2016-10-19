<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\siteTextRepository as siteTextRepository;
use App\Work;


class NavController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(siteTextRepository $siteText)
    {
        $this->siteText = $siteText;
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

        $featured = Work::select('url','info')->where('featured',true)->inRandomOrder()->get()->take(6)->toArray();

        for ($i = 0 ; $i < sizeof($featured); $i++)
        {
            $featured[$i]['info'] = json_decode($featured[$i]['info'],true);

            if(isset($featured[$i]['info']['Author']))
            {
              $featured[$i]['creator'] = $featured[$i]['info']['Author'];
            }
            else if (isset($featured[$i]['info']['Artist']))
            {
              $featured[$i]['creator'] = $featured[$i]['info']['Artist'];
            }
            else if (isset($featured[$i]['info']['By']))
            {
              $featured[$i]['creator'] = $featured[$i]['info']['By'];
            }
            else if (isset($featured[$i]['info']['Owner']))
            {
              $featured[$i]['creator'] = $featured[$i]['info']['Owner'];
            }

            if(isset($featured[$i]['info']['Summary']))
            {
              $featured[$i]['description'] = $featured[$i]['info']['Summary'];
            }
            else if (isset($featured[$i]['info']['Description']))
            {
              $featured[$i]['description'] = $featured[$i]['info']['Description'];
            }

        }

        return view('welcome')->with('headertext',$headertext)->with('frontpage_description',$frontpage_description)
        ->with('featured',$featured);
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
