<?php
namespace App\Http\Controllers;

use App\Models\NagarAnugaman;
use App\Models\YojanaUpload;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NagarAnugamanController extends Controller
{
    /**
     * Display the list of WardAnugamans.
     */
    public function index(): View
    {
        $id = $_GET['id'];
        $plan_detail = YojanaUpload::find($id);
        $nagarAnugamans = NagarAnugaman::all();
        return view('nagar_anugaman.view', compact('nagarAnugamans', 'plan_detail'));
    }

    /**
     * Show the form for creating a new WardAnugaman.
     */
    public function create(): View
    {
        return view('nagar_anugamans.create');
    }

    /**
     * Store a newly created WardAnugaman in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'program_name' => 'required|string|max:255',
            'p_ward' => 'required|string|max:10',
            'post_name.*' => 'required|string',
            'name.*' => 'required|string',
            'ward_no.*' => 'required|string',
            'cit_no.*' => 'required|string',
            'issued_d.*' => 'required|string',
            'issued_date.*' => 'required|date_format:Y/m/d',
        ]);

        // Extract form data
        $programName = $request->input('program_name');
        $wardNo = $request->input('p_ward');
        $posts = $request->input('post_name');
        $names = $request->input('name');
        $wardNos = $request->input('ward_no');
        $citNos = $request->input('cit_no');
        $issuedDistricts = $request->input('issued_d');
        $issuedDates = $request->input('issued_date');
        $address = 'add';
        $contact_number = 0;
        $darta_no = $request->input('darta_no');
        // $maxDartaNo = NagarAnugaman::max('darta_no');

        // If there are no existing records, start with darta_no = 1
        // if (is_null($maxDartaNo)) {
        //     $darta_no = 1;
        // } else {
        //     // Otherwise, increment the highest darta_no
        //     $darta_no = $maxDartaNo + 1;
        // }

        // Debugging: Check the extracted data
        // dd($darta_no);

        // Create WardAnugaman records for each row
        foreach ($posts as $key => $post) {
            NagarAnugaman::create([
                'program_name' => $programName,
                'p_ward' => $wardNo,
                'post_name' => $post,
                'name' => $names[$key],
                'ward_no' => $wardNos[$key],
                'cit_no' => $citNos[$key],
                'address' => $address,
                'darta_no' => $darta_no,
                'contact_number' => $contact_number,
                'issued_district' => $issuedDistricts[$key],
                'issued_date' => $issuedDates[$key],
            ]);
        }
        return redirect()->route('nagar_anugamans.show', ['darta_no' => $darta_no])
            ->with('success', 'NagarAnugaman records created successfully.');
    }


    /**
     * Show the form for editing the specified WardAnugaman.
     */
    public function show($darta_no): View
    {
        $nagarAnugaman = NagarAnugaman::where('darta_no', $darta_no)->firstOrFail();
        $nagarAnugamans = NagarAnugaman::where('darta_no', $darta_no)->get();

        // Use compact with separate arguments
        return view('nagar_anugaman.show_nagar_anugaman', compact('nagarAnugaman', 'nagarAnugamans'));
    }
    // WardAnugamanController.php

    public function printView($darta_no): View
    {
        // Fetch records for the given darta_no
        $nagarAnugaman = NagarAnugaman::where('darta_no', $darta_no)->firstOrFail();
        $nagarAnugamans = NagarAnugaman::where('darta_no', $darta_no)->get();

        // Return the print view
        return view('nagar_anugaman.print_nagar_anu', compact('nagarAnugaman', 'nagarAnugamans'));
    }


    public function edit(NagarAnugaman $nagarAnugaman): View
    {
        return view('nagar_anugamans.edit', compact('nagarAnugaman'));
    }

    /**
     * Update the specified WardAnugaman in storage.
     */
    public function update(Request $request, NagarAnugaman $nagarAnugaman): RedirectResponse
    {
        $validated = $request->validate([
            'samiti_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'cit_no' => 'required|string|max:255',
            'issued_district' => 'required|string|max:255',
        ]);

        $nagarAnugaman->update($validated);

        return redirect()->route('nagar_anugamans.index')->with('success', 'NagarAnugaman updated successfully.');
    }

    /**
     * Remove the specified WardAnugaman from storage.
     */
    public function destroy(NagarAnugaman $nagarAnugaman): RedirectResponse
    {
        $nagarAnugaman->delete();

        return redirect()->route('nagar_anugamans.index')->with('success', 'NagarAnugaman deleted successfully.');
    }
}

