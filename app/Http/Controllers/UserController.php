<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function login(){
        return view("auth.Login");
    }

    public function register(){
        return view("auth.Register");
    }

    //add user data into database
    public function regUser(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:user',
            'phone'=>'required|unique:user',
            'password'=>'required|min:8'
        ]);
        $user = new User();
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> phone = $request->phone;
        $user-> password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with('success', 'Successfully Registered!');
        }else{
            return back()->with('fail', 'Something wrong, please try again.');
        }
    }

    //login process
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'The password is incorrect');
            }
        }else{
            return back()->with('fail', 'This email is not registered');
        }
    }
    //dashboard
    public function dashboard(){

        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $list = User::select('select * from user');
        }
        return view('dashboard', compact('data'));
    }
    
    //logout process
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function addUser(){
        return view('AddUser');
    }

    public function saveUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:user',
            'phone'=>'required|unique:user',
            'password'=>'required|min:8'
        ]);
        $user = new User();
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> phone = $request->phone;
        $user-> password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return redirect('listUser')->with('success_add', 'Successfully added a new user.');
        }else{
            return back()->with('fail', 'Something wrong, please try again.');
        }
    }
    public function ListUser(){
        $users = DB::select('select * from user');
        return view('listUser', compact('users'));
    }
    
    public function EditUser($id){
        $isUser = DB::table('user')->where('id', $id)->first();
        return view('editUser', compact('isUser'));
    }

    public function UpdateUser(Request $request, $id){
        DB::table('user')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect('listUser')->with('success_update', 'Successfully updated.');
    }

    public function deleteUser($id){
    DB::table('user')->where('id', $id)->delete();
    return redirect('listUser')->with('success_delete', 'Successfully deleted.');
    }
}
