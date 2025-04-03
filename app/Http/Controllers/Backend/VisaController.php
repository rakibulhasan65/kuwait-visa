<?php

namespace App\Http\Controllers\Backend;

use App\Models\Visa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisaRequest;
use App\Http\Requests\UpdateVisaRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        // If a search term is provided, filter by passport_no
        $visas = Visa::when($request->search, function ($query) use ($request) {
            return $query->where('passport_no', 'like', '%' . $request->search . '%');
        })
        ->latest() // Order by latest first
        ->paginate(10); // Paginate the results with 10 items per page

        return view('backend.pages.visa.index', compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('backend.pages.visa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisaRequest $request)
{
    // Validate the request data
    $data = $request->validated();

    // Generate a unique barcode:
    //   Part 1: 32 hex characters
    //   Part 2: 32 hex characters
    //   Part 3: 8 uppercase alphanumeric characters
    $part1 = bin2hex(random_bytes(16)); // 16 bytes -> 32 hex characters
    $part2 = bin2hex(random_bytes(16)); // 16 bytes -> 32 hex characters
    $part3 = strtoupper(substr(bin2hex(random_bytes(4)), 0, 8)); // 4 bytes -> 8 hex characters, converted to uppercase

    // Concatenate the parts with '/' as a separator
    $data['barcode'] = "{$part1}/{$part2}/{$part3}";

    // Create the new Visa record
    Visa::create($data);

    return redirect()->route('admin.visas.index')
                     ->with('success', 'Visa added successfully');
}

    /**
     * Display the specified resource.
     */
  public function show($id) {
    $visa = Visa::findOrFail($id); // Resourceful route to the show method

    $logoPath = public_path('images/visa-barcode-logo.png');
        if (!file_exists($logoPath)) {
            die('Logo file not found!');
        }
        $qrCode = base64_encode(
            QrCode::format('png')
                ->size(150)
                ->color(53, 96, 156) 
                ->backgroundColor(255, 255, 255) 
                ->merge($logoPath, 0.3, true)
                ->generate($visa->barcode)
        );

   // Generate the QR code
    return view('backend.pages.visa.show', compact('qrCode', 'visa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visa = Visa::find($id); // Find the visa by the ID
        return view('backend.pages.visa.edit', compact('visa'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(UpdateVisaRequest $request, Visa $visa)
{
    // Validate the request data
    $data = $request->validated();

    // If you want to generate a new barcode on update, you can include this logic
    // Otherwise, leave the existing barcode unchanged
    if ($request->has('generate_new_barcode') && $request->generate_new_barcode) {
        // Generate a unique barcode:
        //   Part 1: 32 hex characters
        //   Part 2: 32 hex characters
        //   Part 3: 8 uppercase alphanumeric characters
        $part1 = bin2hex(random_bytes(16)); // 16 bytes -> 32 hex characters
        $part2 = bin2hex(random_bytes(16)); // 16 bytes -> 32 hex characters
        $part3 = strtoupper(substr(bin2hex(random_bytes(4)), 0, 8)); // 4 bytes -> 8 hex characters, converted to uppercase

        // Concatenate the parts with '/' as a separator
        $data['barcode'] = "{$part1}/{$part2}/{$part3}";
    }

    // Update the Visa record with the new data
    $visa->update($data);

    return redirect()->route('admin.visas.index')
                     ->with('success', 'Visa updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visa $visa)
    {
        $visa->delete();
        return redirect()->route('admin.visas.index')->with('success', 'Visa deleted successfully');
    }

   public function downloadeVisa($id)
{
    $visa = Visa::find($id);
    if (!$visa) {
        abort(404, 'Visa not found');
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

public function updateVisaStatus(Request $request)
{
    // Validation
    $request->validate([
        'visa_id' => 'required|exists:visas,id',
        'visa_status' => 'required|in:Pending approved,approved,Awaiting approval'
    ]);

    // Visa record খুঁজে নিয়ে status update করা
    $visa = Visa::find($request->visa_id);
    $visa->visa_status = $request->visa_status;
    $visa->save();

    return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
}


      
}