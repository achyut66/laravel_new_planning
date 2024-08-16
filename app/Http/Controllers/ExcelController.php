<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YojanaUpload;
use App\Models\NagarAnugaman;
use App\Models\WardAnugaman;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Illuminate\View\View;

class ExcelController extends Controller
{
    /**
     * Show the form for uploading an Excel file.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('upload');
    }

    /**
     * Handle the upload and processing of the Excel file.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(): View
    {
        // $data = YojanaUpload::all();
        return view('yojanaupload.yojanalist');
    }
    public function showallprogram(): view
    {
        $data = YojanaUpload::paginate(20);
        $pd = YojanaUpload::all();
        // $w_result = [];
        // $n_result = [];
        // foreach ($pd as $p) {
        //     $darta_no = $p->id; // Assuming 'id' is the 'darta_no'
        //     $exists = WardAnugaman::checkIfExists($darta_no);
        //     $w_result[$darta_no] = $exists;
        // }
        // foreach ($pd as $p) {
        //     $darta_no = $p->id; // Assuming 'id' is the 'darta_no'
        //     $exists = NagarAnugaman::checkIfExists($darta_no);
        //     $n_result[$darta_no] = $exists;
        // }
        // dd($n_result);
        return view('yojanaupload.view_all_plans', compact('data'));
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        // dd('Upload method called');
        if (!$request->hasFile('file')) {
            dd('No file uploaded');
        }

        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ]);

        // Handle the file upload
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->path());

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Prepare data for insertion
        $dataToInsert = [];
        foreach ($rows as $index => $row) {
            // Skip header row if necessary
            if ($index === 0) {
                continue;
            }

            $dataToInsert[] = [
                'program_name' => $row[0] ?? null,
                'p_ward' => $row[1] ?? null,
                'biniyojan_kisim' => $row[2] ?? null,
                'anudan_kisim' => $row[3] ?? null,
                'biniyojan_shrot' => $row[4] ?? null,
                'anudan_rakam' => $row[5] ?? null,
                'first' => $row[6] ?? null,
                'second' => $row[7] ?? null,
                'third' => $row[8] ?? null,
                'fourth' => $row[9] ?? null,
                'bajet_shrot' => $row[10] ?? null,
                'rajpatra_no' => $row[11] ?? null,
                'bajet_shirshak' => $row[12] ?? null,
                'addedDate' => $row[13] ?? null,
                'addedBy' => $request->user()->id, // Assuming user is authenticated
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // dd($dataToInsert);
        // Insert data into the database using Eloquent
        YojanaUpload::insert($dataToInsert);

        // Redirect with success message
        return redirect()->route('yojanaupload.showallprogram')->with('success', 'Excel data imported successfully!');
    }
}
