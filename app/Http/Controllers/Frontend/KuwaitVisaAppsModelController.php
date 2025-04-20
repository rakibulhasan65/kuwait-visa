<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KuwaitVisaAppsModelController extends Controller
{
    public function index()
    {
        return view('frontend.pages.kuwait-evisa-verification');
    }

    public function verificationScan()
    {
        return view('frontend.pages.visa-verification-scan');
    }

    public function visaInquiries(){
        return view('frontend.pages.evisa_inquiry_form');
    }


    public function verificationScanHome()
    {
        return view('frontend.pages.visa-verification-scan-home');
    }

    public function visaDetails(Request $request){
        // validate the request
        
        $request->validate([
        'visa_number' => 'required|digits:9',
        'mio_reference' => 'required|digits:9',
        'passport_number' => 'required|min:6|max:15',
        ], [
            'visa_number.required' => 'Invalid',
            'visa_number.digits' => 'Invalid',

            'mio_reference.required' => 'Invalid',
            'mio_reference.digits' => 'Invalid',

            'passport_number.required' => 'Invalid',
            'passport_number.min' => 'Invalid',
            'passport_number.max' => 'Invalid',
        ]);

        //  validation message blade file show
        
        $evisaApps = Visa::where('visa_number', $request->visa_number)
        ->where('moi_reference', $request->mio_reference)
        ->where('passport_no', $request->passport_number)
        ->first();

        $logoPath = public_path('images/scanercode.png');
        if (!file_exists($logoPath)) {
            die('Logo file not found!');
        }
        $qrCode = base64_encode(
            QrCode::format('png')
                ->size(150)
                ->color(53, 96, 156) 
                ->backgroundColor(255, 255, 255) 
                ->merge($logoPath, 0.3, true)
                ->generate($evisaApps->barcode)
        );
        
        return view('frontend.pages.evisa_web_app_details', compact('evisaApps', 'qrCode'));
    }
}