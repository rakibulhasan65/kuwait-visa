<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadEmploymentVisaController extends Controller
{
    public function downloadEmploymentVisa()
    {
        return view('frontend.pages.download-employment-visa');
    }
}