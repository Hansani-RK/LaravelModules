<?php

namespace Modules\AboutUs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function about()
    {
        return view('aboutus::about');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function contact()
    {
        return view('aboutus::contact');
    }


}
