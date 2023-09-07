<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ScholarExport;
use App\Imports\ScholarImports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ScholarProfile;
use Illuminate\View\View;
use File;
use DB;

class AdminController extends Controller
{
    public function create(): View
    {
        return view('admin.admin_login');
    }
    public function AdminDashboard()
    {

        return view('admin.index');

    } //end Method

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    } //end Method Admin Logout

    public function AdminLogin()
    {
        return view('admin.admin_login');

    } //end Method Admin Login

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));


    } //end Method Admin Profile

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $orig_image_path = public_path('upload/admin_images/' . $data->photo);
            if (File::exists($orig_image_path)) {
                File::delete($orig_image_path);
            }
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end Method Admin Profile Store


    public function adminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));

    } //end Method Admin Change Password

    public function adminUpdatePassword(Request $request)
    {
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Updated Successfuly!',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    } //end Method Admin Update Password
    public function scholarsProfile()
    {
        $scholarsProfile = DB::table('scholar_profile')
            ->select(
                "scholar_profile.*",
                DB::raw("CONCAT(scholar_profile.lastname,', ',scholar_profile.firstname,' ',scholar_profile.middlename) AS fullname"),
                DB::raw("CONCAT(scholar_profile.street,' ',scholar_profile.village,' ',scholar_profile.barangay,', ',scholar_profile.municipality,', ',scholar_profile.province) AS address")

            )

            ->get();

        return view('admin.scholars', compact('scholarsProfile'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ScholarExport, 'scholars_import.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
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





}