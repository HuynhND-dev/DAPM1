<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index() {
        $employer = User::all()->whereNull('delete_at')->where('role_ID', 2)->count();
        $candidate = User::all()->whereNull('delete_at')->where('role_ID', 3)->count();
        $userDeleted = User::all()->whereNotNull('delete_at')->count();

        $currentDate = now()->toDateString();

        $revenue = Apply::join('applications', 'applies.application_ID', '=', 'applications.application_ID')
            ->where('applies.stt_ID', 3)
            ->whereDate('applies.create_at', $currentDate)
            ->sum(DB::raw('applies.salary * 0.5'));
        $revenue = $revenue/1000;

        return view('admin.statistical.index', ['title' => 'Thống kê', 'employer' => $employer, 'candidate' => $candidate, 'userDeleted' => $userDeleted, 'revenue' => $revenue]);
    }
    public function getUser(Request $request) {
        $employer = User::all()->whereNull('delete_at')->where('role_ID', 2)->whereBetween('create_at', [$request->star_date, $request->end_date])->count();
        $candidate = User::all()->whereNull('delete_at')->where('role_ID', 3)->whereBetween('create_at', [$request->star_date, $request->end_date])->count();
        $userDeleted = User::all()->whereNotNull('delete_at')->whereBetween('create_at', [$request->star_date, $request->end_date])->count();
        $user = [
            'employer' => $employer,
            'candidate' => $candidate,
            'userdelete' => $userDeleted
        ];
        return response()->json($user);
    }
    public function getRevenue(Request $request) {

        $date = DB::table('applies as ap')
            ->select(DB::raw('DATE(ap.update_at) as ngay'), DB::raw('SUM(ap.salary * 0.5/1000) as doanh_thu'))
            ->where('ap.stt_ID', '=', 3)
            ->whereBetween('ap.update_at', ['2023-06-01 00:00:00', '2023-07-30 23:59:59'])
            ->groupBy(DB::raw('DATE(ap.update_at)'))
            ->orderBy(DB::raw('DATE(ap.update_at)'))
            ->get();
//        $date = $date->ngay->format('d-m-Y');
//        dd($date);

        if ($request->filter == 1) {
            return response($date);
        } elseif ($request->filter == 2) {

        } elseif ($request->filter == 3) {

        }
    }
}
