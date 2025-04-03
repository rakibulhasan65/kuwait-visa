<?php

namespace App\Http\Controllers\Backend;

use App\Models\ManualVisa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminManualVisaController extends Controller
{
     // Show All Visas
    public function index(Request $request)
    {
         // If a search term is provided, filter by passport_no
         $manual_visas = ManualVisa::when($request->search, function ($query) use ($request) {
            return $query->where('passport_no', 'like', '%' . $request->search . '%');
        })
        ->latest() // Order by latest first
        ->paginate(10);
        return view('backend.pages.manual_visa.index', compact('manual_visas'));
    }

    // Show Create Form
    public function create()
    {
        return view('backend.pages.manual_visa.create');
    }

    // Store Visa Data
    public function store(Request $request)
    {
        $request->validate([
            'passport_no' => 'required|unique:manual_visas',
            'dob' => 'required|date',
            'nationality_en' => 'required|string',
            'pdf_file' => 'required|mimes:pdf', // PDF validation
        ]);

        // Upload PDF
       if ($request->hasFile('pdf_file')) {
            $destinationPath = public_path('pdfs');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $originalName = $request->file('pdf_file')->getClientOriginalName();
            $fileNameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('pdf_file')->getClientOriginalExtension();

            $fileName = date('Y-m-d_H-i-s') . '_' .pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
            $request->file('pdf_file')->move($destinationPath, $fileName);

            $pdfPath = 'pdfs/' . $fileName; 
        }

        // Store Visa
        ManualVisa::create([
            'passport_no' => $request->passport_no,
            'dob' => $request->dob,
            'nationality_en' => $request->nationality_en,
            'file_owner_name' => $fileNameWithoutExtension,
            'pdf_file' => $pdfPath,
        ]);

        return redirect()->route('admin.admin-manual-visas.index')->with('success', 'Manual Visa added successfully!');
    }

    // show Visa Details
    public function show($id)
    {
        $manual_visa = ManualVisa::findOrFail($id);
        return view('backend.pages.manual_visa.show', compact('manual_visa'));
    }

    // Show Edit Form
    public function edit($id)
    {
        $manualVisa = ManualVisa::findOrFail($id);
        return view('backend.pages.manual_visa.edit', compact('manualVisa'));
    }
    

    // Update Visa
    public function update(Request $request, $id)
{
    $manualVisa = ManualVisa::findOrFail($id);

    $request->validate([
        'passport_no' => 'required|unique:manual_visas,passport_no,' . $id,
        'dob' => 'required|date',
        'nationality_en' => 'required|string',
        'pdf_file' => 'nullable|mimes:pdf', // PDF validation (optional)
    ]);

    // Handle PDF Upload
    if ($request->hasFile('pdf_file')) {
        $destinationPath = public_path('pdfs');

        // Ensure the folder exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Delete old PDF file (if exists)
        if ($manualVisa->pdf_file && file_exists(public_path($manualVisa->pdf_file))) {
            unlink(public_path($manualVisa->pdf_file));
        }

        // Upload new PDF file
        $originalName = $request->file('pdf_file')->getClientOriginalName();
        $fileNameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = $request->file('pdf_file')->getClientOriginalExtension();
        $fileName = date('Y-m-d_H-i-s') . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
        $request->file('pdf_file')->move($destinationPath, $fileName);

        $pdfPath = 'pdfs/' . $fileName;
    } else {
        $pdfPath = $manualVisa->pdf_file; // Keep the old file if no new file is uploaded
    }

    // Update Visa Data
    $manualVisa->update([
        'passport_no' => $request->passport_no,
        'dob' => $request->dob,
        'nationality_en' => $request->nationality_en,
        'file_owner_name' => $fileNameWithoutExtension ?? $manualVisa->file_owner_name,
        'pdf_file' => $pdfPath,
    ]);

    return redirect()->route('admin.admin-manual-visas.index')->with('success', 'Manual Visa updated successfully!');
}


    // Delete Visa
    public function destroy($id)
    {
        $manualVisa = ManualVisa::findOrFail($id);
        if ($manualVisa->pdf_file && file_exists(public_path($manualVisa->pdf_file))) {
            unlink(public_path($manualVisa->pdf_file));
        }
        $manualVisa->delete();

        return redirect()->route('admin.admin-manual-visas.index')->with('success', 'Manual Visa deleted successfully!');
    }

    // Download Visa
    public function downloadManualVisa($id)
    {
        $manual_visa = ManualVisa::findOrFail($id);
        $filePath = public_path($manual_visa->pdf_file);
        $newFileName = $manual_visa->file_owner_name;
        return response()->download($filePath, $newFileName);
    }
}