<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function dashboard(){
        return view('admin.admin_dashboard');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        // if($request->isMethod('post')){
             $data= $request->all();
             if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
                 return redirect('admin/dashboard');
             }else{
                 Session::flash('error_message','Invalid email or password');
                return redirect('/');
                // return redirect()->back();
             }
        //      return view('admin.admin_login');
        // }
    }
        // $this->validate($request, [
        //     'email' => 'required|email', 'password' => 'required',
        // ]);
        // if (Auth::validate(['email' => $request->email, 'password' => $request->password, 'status' => 0])) {
        //     return redirect('login')
        //         ->withInput($request->only('email', 'remember'))
        //         ->withErrors('Your account is Inactive or not verified');
        // }
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     // $request->session()->put('LoggedUser',$credentials);

        //     return redirect('admin.home');
        // }
        // return redirect('login')
        //     ->withInput($request->only('email', 'remember'))
        //     ->withErrors([
        //         'email' => 'Incorrect email address or password',
        //     ]);
        // $request->validate([
        //     'email' => 'required|email', 'password' => 'required',
        // ]);
        // $userInfo = Anc_user::where('email','=',$request->email)->first();
        // if(!$userInfo){
        // return back()->with('fail');
        // }
        // else{
        //     if(Hash::check($request->password, $userInfo->password))
        //     $request->session()->regenerate();
        //     return redirect('home');
        
        // }
    // }
    // public function home(Request $request)
    // {
    //     // if($request->session()){
    //     //     return view('home');
    //     // }
    //     // if($request->session()->regenerate()){
    //         // return redirect()->route('home');
    //         return view('admin.admin_dashboard');
    //     // }
    // }
    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('/');
        // if(session()->has('LoggedUser')){
        //     $user = Anc_user::where
        // }
      }
}
