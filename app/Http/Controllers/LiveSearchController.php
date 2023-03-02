<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wards;

use App\Models\Districts;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    public function search_districts(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            // $districts = DB::table('districts')->where('province_code', 'LIKE', '%' . $request->province_code . '%')->orderBy('name')->get();
            $districts = Districts::orderBy('name')->where('province_code', 'LIKE', '%' . $request->province_code . '%')->get();
            if ($districts) {
                foreach ($districts as $district) {
                    $output .= '<option value="' . $district->code . '" selected>' . $district->name . '</option>';
                }
            }
        }
        return Response($output);
    }

    public function search_wards(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            // $wards = DB::table('wards')->where('district_code', 'LIKE', '%' . $request->district_code . '%')->orderBy('name')->get();
            $wards = Wards::orderBy('name')->where('district_code', 'LIKE', '%' . $request->district_code . '%')->get();
            if ($wards) {
                foreach ($wards as $ward) {
                    $output .= '<option value="' . $ward->code . '" selected>' . $ward->name . '</option>';
                }
            }
        }
        return Response($output);
    }

    // public function phonenumber_check(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = '';
    //         $phone_checks = User::with('phonenumber')->where('phonenumber', 'LIKE', '%' . $request->phonenumber . '%')->get();
    //         if ($phone_checks) {
    //             foreach ($phone_checks as $phone_check) {
    //                 if ($phone_check == $request->phonenumber) {
    //                     $output = 'Phone Number already exists!!';
    //                 }
    //             }
    //         }
    //     }
    //     return Response($output);
    // }
}
