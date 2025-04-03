<?php

namespace App\Http\Controllers\Frontend;

use Session;
use App\Models\Visa;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserElectronicVisaDownload extends Controller
{
    public function userElectronicVisaDownload()
    {
        return view('frontend.pages.evisa-find-download_user_form');
    }

    public function frontendEvisaDownload(Request $request)
    {

          $messages = [
        'passport_no.required' => 'Please enter your passport number.',
        'dob.required' => 'Please enter your date of birth.',
        'nationality.required' => 'Please select your nationality.',
        ];

        $validator = Validator::make($request->all(), [
            'passport_no' => 'required',
            'dob' => 'required|date',
            'nationality' => 'required',
        ], $messages);

        if ($validator->fails()) {
            foreach (['passport_no', 'dob', 'nationality'] as $field) {
                if ($validator->errors()->has($field)) {
                    return back()->withErrors([$field => $validator->errors()->first($field)]);
                }
            }
        }
           // Captcha validation
            if ($request->captcha !== Session::get('captcha')) {
                return back()->withErrors(['captcha' => 'Enter the correct captcha.']);
            }

              // validation
         $visa = Visa::where('passport_no', 'LIKE', "%{$request->passport_no}%")
            ->where('nationality_en', 'LIKE', "%{$request->nationality}%")
            ->where('dob', 'LIKE', "%{$request->dob}%")
            ->first();

            //    if no manual visa found with the provided details
            if (!$visa) {
                return back()->withErrors(['passport_no' => 'No eVisa found with the provided details.']);
            }

             $logoPath = public_path('images/visa-barcode-logo.png');
            if (!file_exists($logoPath)) {
                abort(404, 'Logo file not found!');
            }

        
        $qrCode = base64_encode(
            QrCode::format('png')
                ->size(150)
                ->color(53, 96, 156)
                ->backgroundColor(255, 255, 255)
                ->merge($logoPath, 0.3, true)
                ->generate($visa->barcode)
        );
        return view('frontend.pages.visa-pdf-download', compact('qrCode', 'visa'));
    }
}