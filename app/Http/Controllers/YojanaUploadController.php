<?php

namespace App\Http\Controllers;

use App\Models\YojanaUpload;
use App\Models\PlanDetail;
use Illuminate\Http\Request;
use Illuminate\View\View; // Make sure to import the View class
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class YojanaUploadController extends Controller
{
    public function index(): View
    {
        // $data = YojanaUpload::all();
        return view('yojanaupload.yojanalist');
    }
    public function import(Request $request)
    {
        // Validate the file
        $request->validate([
            'yojanafile' => 'required|file|mimes:xlsx,csv',
        ]);

        // Load the file
        $file = $request->file('yojanafile');

        // Import the file
        Excel::import(new class implements \Maatwebsite\Excel\Concerns\ToModel, \Maatwebsite\Excel\Concerns\WithHeadingRow {
            public function model(array $row)
            {
                return new PlanDetail([
                    'program_name' => $row['program_name'],
                    'p_ward' => $row['p_ward'],
                    'biniyojan_kisim' => $row['biniyojan_kisim'],
                    'anudan_kisim' => $row['anudan_kisim'],
                    'biniyojan_shrot' => $row['biniyojan_shrot'],
                    'anudan_rakam' => $row['anudan_rakam'],
                    'first' => $row['first'],
                    'second' => $row['second'],
                    'third' => $row['third'],
                    'fourth' => $row['fourth'],
                    'bajet_shrot' => $row['bajet_shrot'],
                    'rajpatra_no' => $row['rajpatra_no'],
                    'bajet_shirshak' => $row['bajet_shirshak'],
                    'addedDate' => $row['addedDate'],
                    'addedBy' => $row['addedBy'],
                ]);
            }
        }, $file);

        return redirect()->back()->with('success', 'File imported successfully.');
    }
}
