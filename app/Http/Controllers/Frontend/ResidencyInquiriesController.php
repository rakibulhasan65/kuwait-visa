<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidencyInquiriesController extends Controller
{
    public function residencyInquiries(){
        return view('frontend.pages.residency_inquiries');
    }
}