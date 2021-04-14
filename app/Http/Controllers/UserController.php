<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

//Request
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

//Models
use App\Models\User;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\FormsModel;
use Illuminate\Database\Eloquent\Model;

//Interface

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check())
        {
            if(Auth::user()->navigation_type == "ADMIN"){ return redirect('admin/general-master'); }
            if(Auth::user()->navigation_type == "HOD"){ return redirect('hod/'); }
            return redirect('user/');
        }

        if ($request->isMethod('POST'))
        {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            {
                if(Auth::user()->navigation_type == "ADMIN"){ return redirect('admin/general-master'); }
                if(Auth::user()->navigation_type == "HOD"){ return redirect('hod'); }
                return redirect('user/');
            }
            return "LOGIN ID PASSWORD WRONG...";
        }
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function fetch()
    {
        $usersModel = User::all();
        $departmentDataset = DepartmentModel::all();
        $FormsModel = FormsModel::all();

        return view('user.fetch', [
            'users' => $usersModel,
            'departmentDataset' => $departmentDataset,
            'FormsModel' => $FormsModel
        ]);
    }

    public function detail($id)
    {
        $usersModel = User::find($id);
        $departmentDataset = DepartmentModel::all();
        $FormsModel = FormsModel::all();

        return view('user.detail', [
            'user' => $usersModel,
            'departmentDataset' => $departmentDataset,
            'FormsModel' => $FormsModel
        ]);
    }

    public function add(UserRequest $request)
    {
        $model = new User();
        if ($request->isMethod('POST')) {
            $model->add($request);
            return redirect()->back()->with('alert', 'User Added Successfuly...');
            return redirect('admin/user/fetch');
        }

        $departmentModel = DepartmentModel::all();
        $roleModel = RoleModel::all();
        return view('user.add', [
            'departments' => $departmentModel,
            'roles' => $roleModel
        ]);
    }

    public function remove($user_id)
    {
        $model = User::find($user_id);
        $model->delete();
        return redirect()->back();
    }

    public function edit()
    {
    
    }
}
