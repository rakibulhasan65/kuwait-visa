<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GetScanerDataController extends Controller
{
   public function searchVisa(Request $request)
{
    try {
        $barcode = $request->query('barcode');
        \Log::info("Received barcode: " . $barcode);

        if (!$barcode) {
            return response()->json([
                'success' => false,
                'message' => 'Barcode parameter missing!'
            ], 400);
        }
        $visa = Visa::where('barcode', $barcode)->first();
        if ($visa) {
            // Return the route URL and visa details
            return response()->json([
                'success' => true,
                'route' => route('scan-visa-view-data', ['barcode' => $barcode]), // Pass barcode to the route
            ], Response::HTTP_OK);
        }

        return response()->json([
            'success' => false,
            'message' => 'Visa not found!'
        ], 404);

    } catch (\Exception $e) {
        \Log::error("Error in searchVisa: " . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Server Error: ' . $e->getMessage()
        ], 500);
    }
}


public function scanVisaViewData(Request $request){
    
    $barcode = $request->query('barcode');
    $visa = Visa::where('barcode', $barcode)->first();

    return view('frontend.pages.scan-visa-view-data', compact('visa'));
}

}