<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\District;
use App\Models\Language;
use App\Models\Province;
use App\Models\Role;
use App\Models\Skill;
use App\Models\Users_Categories;
use App\Models\Users_Languages;
use App\Models\Users_Skills;
use App\Models\Ward;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function candidate()
    {
        $user = User::all()->where('role_ID', '=', 3)->whereNull('delete_at')->sortByDesc('create_at');
        return view('admin.user.index', ['title' => 'Danh sách thành viên', 'users' => $user, 'role' => 'Ứng viên']);
    }

    public function employer()
    {
        $user = User::all()->where('role_ID', '=', 2)->whereNull('delete_at')->sortByDesc('create_at');
        return view('admin.user.index', ['title' => 'Danh sách thành viên', 'users' => $user, 'role' => 'Nhà tuyển dụng']);
    }

    public function deleted()
    {
        $user = User::all()->whereNotNull('delete_at')->sortByDesc('delete_at');
//        dd($user);
        return view('admin.user.deleted', ['title' => 'Danh sách thành viên đã vô hiệu', 'users' => $user]);
    }

    public function create()
    {
        $roles = Role::all()->where('role_ID', '!=', 1);
        $categories = Category:: all()->sortBy('name');
        $skills = Skill::all();
        $languages = Language::all()->where('parent_ID', 0);
        $certificates = Language::all()->where('parent_ID', '!=', 0);
        $provinces = Province::all()->sortBy('name');
        return view('admin.user.create', ['title' => 'Thêm mới thành viên',
            'roles' => $roles,
            'categories' => $categories,
            'skills' => $skills,
            'languages' => $languages,
            'provinces' => $provinces,
            'languages' => $languages,
            'certificates' => $certificates]);
    }

    public function getDistrict(Request $request)
    {
        $districts = District::all()->where("province_ID", '=', $request->province_ID)->sortBy('name');
        return response()->json($districts);
    }

    public function getWard(Request $request)
    {
        $wards = Ward::all()->where("district_ID", '=', $request->district_ID)->sortBy('name');
//        dd($wards);
        return response()->json($wards);
    }

    public function getCertificate(Request $request)
    {
//        dd($request->parent_ID);
        $certificates = Language::all()->where('parent_ID', '!=', 0);
        $certificates = $certificates->WhereIn('parent_ID', $request->parent_ID);
        return response()->json($certificates);
    }

    public function getUsername(Request $request)
    {
        $username = User::all()->where('username', $request->username);
        if ($username->isEmpty()) {
            return response(0);
        } else {
            return response(1);
        }
    }

    public function getPhone(Request $request)
    {
        $username = User::all()->where('phone', $request->phone);
        if ($username->isEmpty()) {
            return response(0);
        } else {
            return response(1);
        }
    }

    public function getEmail(Request $request)
    {
        $username = User::all()->where('email', $request->email);
        if ($username->isEmpty()) {
            return response(0);
        } else {
            return response(1);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|min:3|unique:users,username',
            'password' => 'max:255|confirmed',
            'email' => 'required|max:255|min:5',
            'avata' => 'image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'required|max:999999999999999|min:0|numeric',
        ],[
            'password.confirmed' => 'Xac nhan mat khau khong trung khop!',
            'password.min' => 'Do dai mat khau qua ngan!',
            'avata' => 'Chi duoc tai HINH ANH'
        ]);

        $input = $request->all();
//        dd($input);
        if ($request->avata) {
            $avata = time() . '.' . $request->avata->extension();
            $request->avata->move(public_path('images'), $avata);
        } else {
            $avata = '';
        }

        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = bcrypt($input['password']);
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->experience = $request->experience;
        $user->ward_ID = $request->ward_ID;
        $user->avata = $avata;
        $user->role_ID = $request->role_ID;
        $user->balance = $request->balance;
        $user->create_at = now();
        $user->save();

        $lastUser_ID = $user->user_ID;
        $category_ID = explode(',', $request->category[0]);
        $skill_ID = explode(',', $request->skill[0]);
        $laguage_ID = explode(',', $request->language[0]);

        if ($request->newCategory) {
            $newCategory = new Category;
            $newCategory->name = $request->newCategory;
            $newCategory->save();
            $lastCat_ID = $newCategory->category_ID;
//            dd($lastCat_ID);
            $category = new Users_Categories;
            $category->user_ID = $lastUser_ID;
            $category->category_ID = $lastCat_ID;
            $category->save();
        }
        if ($category_ID[0]) {
            foreach ($category_ID as $cat) {
                $category = new Users_Categories;
                $category->user_ID = $lastUser_ID;
                $category->category_ID = $cat;
                $category->save();
            }
        }

        if ($request->newSkill) {
            $newSkill = new Skill();
            $newSkill->name = $request->newSkill;
            $newSkill->save();
            $lastSkill_ID = $newSkill->skill_ID;
//            dd($lastSkill_ID);
            $skill = new Users_Skills();
            $skill->user_ID = $lastUser_ID;
            $skill->skill_ID = $lastSkill_ID;
            $skill->save();
        }
        if ($skill_ID[0]) {
            foreach ($skill_ID as $sk_id) {
                $skill = new Users_Skills;
                $skill->user_ID = $lastUser_ID;
                $skill->skill_ID = $sk_id;
                $skill->save();
            }
        }
        if ($laguage_ID[0]) {
            foreach ($laguage_ID as $lg_id) {
                $lang = new Users_Languages;
                $lang->user_ID = $lastUser_ID;
                $lang->language_ID = $lg_id;
                $lang->save();
            }
        }

        return Redirect::back()->with('success', 'Thêm mới thành công!');
    }

    public function disableUser(Request $request)
    {
        $disable = User::where('user_ID', $request->id)->update(['delete_at' => now()]);

        return response($disable);
    }
    public function enableUser($id)
    {
        $enable = User::where('user_ID', $id)->first();
        $enable->delete_at = NULL;
        $enable->save();

        return Redirect::back()->with('success', 'Khôi phục thành công thành công!');
    }

    public function edit($id)
    {
        $user = User::find($id);
//        dd($user);
        $allCategories = Category::all()->sortBy('name');
        $categories = Users_Categories::all()->where('user_ID', $id);
//        dd($categories);
        $allSkills = Skill::all()->sortBy('name');
        $skills = Users_Skills::all()->where('user_ID', $id);

        $allLanguages = Language::all()->where('parent_ID', 0)->sortBy('name');
        $languages = Users_Languages::all()->where('user_ID', $id);
        $allRoles = Role::all()->where('role_ID', '!=', 1);
        $allCertificates = Language::all()->where('parent_ID', '!=', 0);
        $addressQuery = DB::table('wards')
            ->select('provinces.province_ID as province', 'districts.district_ID as district', 'wards.ward_ID as ward')
            ->join('districts', 'wards.district_ID', 'districts.district_ID')
            ->join('provinces', 'districts.province_ID', 'provinces.province_ID')
            ->where('wards.ward_ID', $user->ward_ID);
        $address = $addressQuery->get();
//dd($user->ward_ID);
//        dd($address);
        $provinces = Province::all()->sortBy('name');
        $districts = District::all()->where('province_ID', $address[0]->province)->sortBy('name');
//        dd(364);
        $wards = Ward::all()->where('district_ID', $address[0]->district)->sortBy('name');
//        dd($districts);
        return view('admin.user.edit', ['title' => 'Chỉnh sửa thành viên',
            'allRoles' => $allRoles,
            'allCategories' => $allCategories,
            'categories' => $categories,
            'allSkills' => $allSkills,
            'skills' => $skills,
            'allLanguages' => $allLanguages,
            'lang' => $languages,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
            'allCertificates' => $allCertificates,
            'address' => $address,
            'user' => $user]);
    }

    public function update(Request $request)
    {
//        dd($request);
                $request->validate([
            'email' => 'required|max:255|min:5',
            'avata' => 'image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'required|max:999999999999999|min:0|numeric',
        ],[
            'avata' => 'Chi duoc tai HINH ANH'
        ]);

        $user = User::find($request->user_ID);
        $input = $request->all();
//        dd($input);
        if ($request->avata) {
            $avata = time() . '.' . $request->avata->extension();
            $request->avata->move(public_path('images'), $avata);
            $user->avata = $avata;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->experience = $request->experience;
        $user->ward_ID = $request->ward_ID;
        $user->role_ID = $request->role_ID;
        if ($request->balance) {
            $user->balance = $request->balance;
        }
        $user->update_at = now();
        $user->save();

        $lastUser_ID = $user->user_ID;
        $category_ID = explode(',', $request->category[0]);
        $skill_ID = explode(',', $request->skill[0]);
        $laguage_ID = explode(',', $request->language[0]);

        if ($request->newCategory) {
            $newCategory = new Category;
            $newCategory->name = $request->newCategory;
            $newCategory->save();
            $lastCat_ID = $newCategory->category_ID;
//            dd($lastCat_ID);
            $category = new Users_Categories;
            $category->user_ID = $lastUser_ID;
            $category->category_ID = $lastCat_ID;
            $category->save();
        }
        $cat = Users_Categories::where('user_ID', $request->user_ID)->get();
        $cat->each->delete();
        if ($category_ID[0]) {
            foreach ($category_ID as $cat) {
                $category = new Users_Categories;
                $category->user_ID = $lastUser_ID;
                $category->category_ID = $cat;
                $category->save();
            }
        }

        if ($request->newSkill) {
            $newSkill = new Skill();
            $newSkill->name = $request->newSkill;
            $newSkill->save();
            $lastSkill_ID = $newSkill->skill_ID;
//            dd($lastSkill_ID);
            $skill = new Users_Skills();
            $skill->user_ID = $lastUser_ID;
            $skill->skill_ID = $lastSkill_ID;
            $skill->save();
        }
        $sk = Users_Skills::where('user_ID', $request->user_ID)->get();
        $sk->each->delete();
        if ($skill_ID[0]) {
            foreach ($skill_ID as $sk_id) {
                $skill = new Users_Skills;
                $skill->user_ID = $lastUser_ID;
                $skill->skill_ID = $sk_id;
                $skill->save();
            }
        }

        $language = Users_Languages::where('user_ID', $request->user_ID)->get();
        $language->each->delete();
        if ($laguage_ID[0]) {
            foreach ($laguage_ID as $lg_id) {
                $lang = new Users_Languages;
                $lang->user_ID = $lastUser_ID;
                $lang->language_ID = $lg_id;
                $lang->save();
            }
        }
        return Redirect::back()->with('success', 'Cập nhật thành công thành công!');
    }


    public function changePassword($id)
    {
        $user = User::find($id);
//        dd($user);
        return view('admin.user.changePassword',['title' => 'Đổi mật khẩu', 'user' => $user]);
    }

    public function updatePassword(Request $request) {
//        dd($request);
        $request->validate([
            'password' => 'max:255|confirmed',
        ],[
            'password.confirmed' => 'Xac nhan mat khau khong trung khop!',
            'password.min' => 'Do dai mat khau qua ngan!',
        ]);

        $user = User::find($request->user_ID);
        $user->password = bcrypt($request->password);
        $user->save();
        if ($user) {
            return back()->withSuccess('Cập nhật mật khẩu thành công!');
        }
        return back()->withErrors('Cập nhật mật khẩu thất bại!');
    }
}
