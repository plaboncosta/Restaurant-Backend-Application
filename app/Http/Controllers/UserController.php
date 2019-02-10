<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('superadmin');
    }

    public function index(){
    	$users = User::where('status',1)->get();
    	return view('admin.user.all', compact('users'));
    }




    // User Add Code
    public function add(){
        $usersrole = UserRole::all();
        return view('admin.user.add', compact('usersrole'));
    }

    public function view(Request $request){
        $this->validate($request, [
            'name' => 'required|max:25',
            'email' => 'required|email',
            'role_name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_name;
        $user->password = $request->password;
        $user->save();
        return redirect()->action('UserController@index')->with('success', 'User Created Successfully');
    }





    public function show($id){
        $show_user = User::find($id);
        return view('admin.user.view', compact('show_user'));
    }





    // User Edit Code
     public function edit($id){
        $users = User::find($id);
        $usersrole = UserRole::all();
        return view('admin.user.edit',compact('users', 'usersrole'));
     }

     public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:25',
            'email' => 'required|email',
            'role_name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_name;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->action('UserController@index')->with('success', 'User Updated Successfully');
     }





    // User Soft Delete Code
    public function soft_delete($id){
    	$softdel = User::where('status', 1)->where('id', $id)->update([
    		'status'=>0
    	]);

    	if($softdel){
    		return redirect('admin/user')->with('User Deleted Successfully');
    	}
    	else{
    		return redirect('admin/user');
    	}

    }














}













