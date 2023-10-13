<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\News;
use App\Models\Project;


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
                $output .= '<option value="" selected>Quận/Huyện</option>';
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
                $output .= '<option value="" selected>Xã/Phường/Thị trấn</option>';
                foreach ($wards as $ward) {
                    $output .= '<option value="' . $ward->code . '" selected>' . $ward->name . '</option>';
                }
            }
        }
        return Response($output);
    }

    public function search_projects(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $projects = Project::orderBy('name')->where('province_id', 'LIKE', '%' . $request->province_id . '%')->get();
            if ($projects) {
                $output .= '<option value="" selected>Dự án</option>';
                foreach ($projects as $project) {
                    $output .= '<option value="' . $project->id . '" selected>' . $project->name . '</option>';
                }
            }
        }
        return Response($output);
    }

    // ---------------------------------------------------------------------------------------------------------------------------------------
    public function phonenumber_check(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            // $phone_checks = User::find()->where('phonenumber', 'LIKE', '%' . $request->phonenumber . '%')->get();
            $users = User::all();
            foreach ($users as $user) {
                if ($user->phonenumber == $request->phonenumber) {
                    $output = 'The phonenumber has already been taken';
                }
            }
        }
        return Response($output);
    }
}
