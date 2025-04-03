<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class VisaInquiryController extends Controller
{
    public function index()
    {
        return view('frontend.pages.visa-inquiry');
    }

  

    public function find(Request $request)
    {
        // Debugging: Request data log (for development)
        // Log::info('Visa Search Request:', $request->all());

        // Validate request inputs
        $request->validate([
            'passport_no' => 'required|string',
            'dob' => 'required|date',
            'nationality' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        // Find visa by passport number, date of birth, and nationality
        $visa = Visa::where([
            ['passport_no', '=', $request->passport_no],
            ['dob', '=', $request->dob],
            ['nationality', '=', $request->nationality],
        ])->first();

        if ($visa) {
            // Visa found, redirect to visa details page
            return redirect()->route('visa.details', $visa->id);
        } else {
            // Visa not found, return back with old input and error message
            return redirect()->back()->withInput()->with('error', 'Visa not found');
        }
    }

    public function details($id)
    {
        $visa = Visa::findOrFail($id);
        return view('frontend.pages.visa-details', compact('visa'));
    }

    public function download()
    {
        return view('frontend.pages.visa-download');
    }

}