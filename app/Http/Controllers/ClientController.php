<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Fields;
use App\Models\Levels;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    public function __construst()
    {
        $provinces = Province::all();
        $this->provinces = $provinces;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all()->sortBy('name');
        return view('client.index', ['provinces' => $provinces, 'title' => 'Trang chủ']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applications = Application::where('application_ID', $id)->get();
//        dd($applications);
        $user_ID = $applications[0]->own_ID;
        $employers = User::where('user_ID', $user_ID)->get();
        $categories = Category::select('categories.name')
            ->join('applications_categories', 'categories.category_ID', '=', 'applications_categories.category_ID')
            ->join('applications', 'applications.application_ID', '=', 'applications_categories.application_ID')
            ->where('applications.application_ID', '=', $applications[0]->application_ID)
            ->get();
        $applies = Apply::where('application_ID', $id)->where('user_ID', Auth::user()->user_ID)->get();
        if (empty($applies[0])) {
            $applies[0] = '';
        }
//        dd($applies);
        $location = Province::select(DB::raw('provinces.name as province'), DB::raw('districts.name as district'))
                    ->join('districts', 'provinces.province_ID', '=', 'districts.province_ID')
                    ->join('wards', 'wards.district_ID', '=', 'districts.district_ID')
                    ->where('ward_ID', $applications[0]->ward_ID)->get();
        return view('client.detail', ['application' => $applications, 'applies' => $applies, 'employer' => $employers, 'categories' => $categories, 'location' => $location, 'title' => 'Chi tiết']);
    }

    public function search(Request $request)
    {

//        dd($request);

        $fields = Fields::all();
        $levels = Levels::all();
        $provinces = Province::all()->sortBy('name');
        $query = DB::table('applications');
        if ($request->position) {
            $query->where('applications.name', 'like', '%' . $request->position . '%');
        }
        if ($request->location) {
            $query->where('provinces.province_ID', '=', $request->location);
        }
        if ($request->salary) {
            $salary = explode(',', $request->salary);
            $salary[0] = $salary[0] * 1000;
            $salary[1] = $salary[1] * 1000;
//            dd($salary[1]);
            $query->whereBetween('applications.salary_from', $salary);
        }
        if ($request->filter) {
            if ($request->field) {
                $query->where('fields.field_ID', $request->field);
            }
            if ($request->level) {
                $query->where('level_ID', $request->level);
            }
            if ($request->gender) {
                $query->where('gender', $request->gender);
            }
//            dd($request->experience);
            if ($request->experience) {
                if ($request->experience != 6) {
                    $query->where('years_experience', '=', $request->experience);
                } else {
                    $query->where('years_experience', '>=', 5);
                }
            }
//            if ($request->salary) {
//                $salary = explode(',', $request->salary);
//                $query->whereBetween('applications.salary_from', $salary);
//            }
        }


        $query->select('applications.*', 'districts.name as district', 'provinces.name as province', 'fields.name as field', DB::raw('GROUP_CONCAT(categories.name) as category'));
        $query->join('wards', 'applications.ward_ID', 'wards.ward_ID');
        $query->join('districts', 'wards.district_ID', 'districts.district_ID');
        $query->join('provinces', 'districts.province_ID', 'provinces.province_ID');
        $query->join('applications_categories', 'applications.application_ID', 'applications_categories.application_ID');
        $query->join('categories', 'applications_categories.category_ID', 'categories.category_ID');
        $query->join('fields', 'categories.field_ID', 'fields.field_ID');
        $query->groupBy('applications.application_ID',
            'applications.own_ID',
            'applications.name',
            'applications.image',
            'applications.location',
            'applications.gender',
            'applications.ward_ID',
            'applications.salary_from',
            'applications.salary_to',
            'applications.experience',
            'applications.position_ID',
            'applications.level_ID',
            'applications.deadline',
            'applications.description',
            'applications.requirement',
            'applications.stt_ID',
            'applications.create_at',
            'applications.update_at',
            'applications.delete_at',
            'districts.name',
            'provinces.name',
            'fields.name',
            'applications.welfare',
            'applications.embed',
            'applications.years_experience',

        );


//        $query->join('categories', 'applications_categories.category_ID', 'categories.category_ID');
        $applications = $query->paginate(5);
//dd($applications);
//$reply = $request;
        return view('client.search', ['provinces' => $provinces, 'applications' => $applications, 'fields' => $fields, 'levels' => $levels, 'reply' => $request, 'title' => 'Tìm kiếm']);
    }

    public function apply(Request $request)
    {
//        dd($request);
        if (Auth::check()) {
            if ($request->stt_ID == 0) {
                $apply = new Apply;
                $apply->user_ID = $request->candidate_ID;
                $apply->application_ID = $request->job_ID;
                $apply->stt_ID = 1;
                $apply->create_at = now();
                $apply->update_at = now();
                $apply->save();
                $data = [
                    'candidate' => $request->candidate_ID,
                    'job' => $request->job_ID,
                    'stt' => 'apply'
                ];
            } elseif ($request->stt_ID == 1) {
                $apply = Apply::where('user_ID', $request->candidate_ID)->where('application_ID', $request->job_ID)->delete();
                $data = [
                    'candidate' => $request->candidate_ID,
                    'job' => $request->job_ID,
                    'stt' => 'cancer'
                ];
            }
            return response($data);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function ck()
    {
        return view('client.ck');
    }
    public function cks(Request $request)
    {
        dd($request);
    }

}
