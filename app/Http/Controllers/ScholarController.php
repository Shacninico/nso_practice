<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ScholarExport;
use App\Imports\ScholarImports;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ScholarProfile;
use DB;
use File;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ScholarController extends Controller
{
    public function export()
    {
        return Excel::download(new ScholarExport, 'scholars_import.xlsx');
    }
    public function import()
    {
        try {

            Excel::import(new ScholarImports, request()->file('file'));
            return back();

        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // view(Excel::import(new ScholarProfile,request()->file('file')));
    }

    public function deleteAll()
    {
        DB::table('scholar_profile')->delete();
        return back();
    }

    public function viewSchoPage(Request $spas_id): View
    {
        // $scholarProfile = DB::table('scholar_profile')->get()->where('spas_id', '$spas_id')->first();  
        $scholarProfile = ScholarProfile::find($spas_id)->first();
        Log::info('nikko pogi');
        return view('admin.scholars.scholar_view', compact(['scholarProfile']));
    } // Method Show Scholar
    public function editSchoPage(Request $spas_id): View
    {
        $scholarProfile = DB::table('scholar_profile')->where('spas_id', $spas_id)->first();
        return view('admin.scholars.scholar_view', compact(['scholarProfile']));
    } // Method Edit Scholar

    public function destroy(Request $spas_id): RedirectResponse
    {
        $spas_id->delete();
        return view('admin.scholars.scholar_view');

    } // Method Delete Scholar


}