<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Men_official;


class PagesController extends Controller
{
    //authentication pages
    public function Index()
    {
        return view('pages.index');
    }

    public function About()
    {
        return view('pages.about');
    }

    public function Contact()
    {
        return view('pages.contact');
    }

    public function Services()
    {
        return view('pages.services');
    }
}
