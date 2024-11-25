<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Imports\AssetImport;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    // Menampilkan data asset
    public function index()
    {
        // Mengambil semua data asset dari database
        $assets = Asset::all();
        // Mengirimkan data asset ke tampilan (view)
        return view('asset.index', compact('assets'));
    }

    // Mengimpor data asset dari file Excel
    public function importExcelData(Request $request)
{
    // Validasi input
    $request->validate([
        'import_file' => 'required|file|mimes:xlsx,csv',
        'week' => 'required|numeric',
    ]);

    // Ambil nilai week dari request
    $week = $request->input('week');

    // Impor file Excel
    $import = new AssetImport($week); // Kirim nilai week ke import
    Excel::import($import, $request->file('import_file'));

    return redirect()->back()->with('status', 'Imported Successfully');
}
    
}
