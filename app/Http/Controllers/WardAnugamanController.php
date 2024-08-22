<?php
namespace App\Http\Controllers;

use App\Models\WardAnugaman;
use App\Models\YojanaUpload;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WardAnugamanController extends Controller
{
    /**
     * Display the list of WardAnugamans.
     */
    public function index(): View
    {
        $id = $_GET['id'];
        $plan_detail = YojanaUpload::find($id);
        $wardAnugamans = WardAnugaman::all();
        return view('ward_anugaman.view', compact('wardAnugamans', 'plan_detail'));
    }

    /**
     * Show the form for creating a new WardAnugaman.
     */
    public function create(): View
    {
        return view('ward_anugamans.create');
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
            'issued_date.*' => 'required|date_format:Y/m/d|date_format:Y-m-d',
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


        foreach ($posts as $key => $post) {
            WardAnugaman::create([
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
        return redirect()->route('ward_anugamans.show', ['darta_no' => $darta_no])
            ->with('success', 'WardAnugaman records created successfully.');
    }


    /**
     * Show the form for editing the specified WardAnugaman.
     */
    public function show($darta_no): View
    {
        $wardAnugaman = WardAnugaman::where('darta_no', $darta_no)->firstOrFail();
        $wardAnugamans = WardAnugaman::where('darta_no', $darta_no)->get();

        // Use compact with separate arguments
        return view('ward_anugaman.show_anugaman', compact('wardAnugaman', 'wardAnugamans'));
    }
    // WardAnugamanController.php

    public function printView($darta_no): View
    {
        // Fetch records for the given darta_no
        $wardAnugaman = WardAnugaman::where('darta_no', $darta_no)->firstOrFail();
        $wardAnugamans = WardAnugaman::where('darta_no', $darta_no)->get();

        // Return the print view
        return view('ward_anugaman.print_view', compact('wardAnugaman', 'wardAnugamans'));
    }

    public function showall(): View
    {
        // $allWardData = WardAnugaman::all();
        dd('jhshkj');
        return view('ward_anugaman.alldatainsheet', compact('allWardData'));
    }

    public function edit(WardAnugaman $wardAnugaman): View
    {
        return view('ward_anugamans.edit', compact('wardAnugaman'));
    }

    /**
     * Update the specified WardAnugaman in storage.
     */
    public function update(Request $request, WardAnugaman $wardAnugaman): RedirectResponse
    {
        $validated = $request->validate([
            'samiti_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'cit_no' => 'required|string|max:255',
            'issued_district' => 'required|string|max:255',
        ]);

        $wardAnugaman->update($validated);

        return redirect()->route('ward_anugamans.index')->with('success', 'WardAnugaman updated successfully.');
    }

    /**
     * Remove the specified WardAnugaman from storage.
     */
    public function destroy(WardAnugaman $wardAnugaman): RedirectResponse
    {
        $wardAnugaman->delete();

        return redirect()->route('ward_anugamans.index')->with('success', 'WardAnugaman deleted successfully.');
    }
}

