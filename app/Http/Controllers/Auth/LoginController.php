<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ActiveUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\History;
use Carbon\Carbon;
class LoginController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('backendacess')->except('logout');
    //}
    public function show_login_form()
    {
        return view('pages.loginForm');
    }
    //
    //
    public function process_login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $message = DB::table('contact_form')->get()->count();
        $user = DB::table('users')->get();
        //$approve = DB::table('Property_Approval')->get()->count();
        $pending = DB::table('property')->get()->count();
        //$pending = $pending - $approve;
        $count = $user->count();
        //input name= 
        
        $credentials = $request->except(['_token']);
        //auth: email password name
        //auth: (Session: all function(include check(), user()))

        
        //Illuminate/Support/Facade/Auth
        if(auth()->attempt($credentials))
        {
            $history = new History();
            $history->id = null;
            $history->action = $request->name." successfully login with an ID: ".auth()->user()->id." at ".Carbon::now();
            $history->backend_id = auth()->user()->id;
            $history->save();
            return redirect("/home")->with(['count'=> $count, 'message' =>$message, 'pending' =>$pending ]);

        }else{
            $history = new History();
            $history->id = null;
            $history->action = "user fail to login at ".Carbon::now();
            $history->backend_id = 0;
            $history->save();
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    //    //
        //$credential = 
        //Auth::attempt(['email' => $email, 'password' => $password])
        //$credentials = Auth::attempt(['admin_username' => $request->username, 'password' => ($request->password)]);
        //dd($credentials);
        //$auth = User::where([['admin_username', '=', $request->username],['admin_password', '=', Hash::make($request->password)]])->get();
        //dd($auth);
        //if($auth)
        //{
        //    Auth::login($auth);
        //    return redirect('/home');
        //}
        //else
        //{
        //    dd($auth);
        //}
          //$credentials = Auth::attempt(['admin_username' => $request->username, 'admin_password' => ($request->password)]);
    //    $user = User::where('admin_username', $request->username)->where('admin_password', bcrypt($request->password))->get();
        //if(!$credentials)
        //{
        //    return dd($credentials);
        //    //return view('pages.home',['status' => $request->username]);
        //}
    //        return view('pages.home',['status' => $request->username]);
    //    }
        //else
        //{
        //    session()->flash('message', 'Invalid credentials');
        //    return redirect()->back();
        //}
    //    //$status = DB::table('admin')->where([['username', '=', $request->username],['password', '=', $request->password]])->get();        
    //    //if($status)
    //    //{
    //    //    Session::put('name', $request->username);
    //    //    session()->flash('message', 'Login Successfully!');
    //    //    return view('pages.home',['status' => $request->username]);
    //    //}
    //    //else{
    //    //    session()->flash('message', 'Invalid credentials');
    //    //    return redirect()->back();
    //    //}
    //    //if (auth()->attempt($credentials)) {
    //    //
    //    //    return redirect("/");
    //    //
    //    //}else{
    //    //
    //    //        //    session()->flash('message', 'Invalid credentials');
    //    //        //    return redirect()->back();
    //    //        //}
    //    //
    }
    //
    public function show_signup_form()
    {
        return view('pages.register');
    }
    //
    public function process_signup(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $user = new User();
        $user->name = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->id = null;
        $user->save();
        return redirect()->route('backendUser');
        //if($exist)
        //{
        //    session()->flash('message', 'Your registration already exist');
        //}
        //else
        //{
        //    try {
        //        User::create([
        //            'admin_username' => trim($request->input('username')),
        //            'admin_role' => strtolower($request->input('role')),
        //            'admin_password' => bcrypt($request->input('password')),
        //        ]);
        //        session()->flash('message', 'Your account is created');
        //    } catch (\Illuminate\Database\QueryException $e) {
        //        session()->flash('message', 'Your registration is getting problem');
        //    }
        //}
        //return redirect()->route('login');
        //$user = new Admin();
        //$user->id = null;
        //$user->username = $request->username;
        //$user->password = $request->password;
        //$user->type = $request->role;
        //$exist = DB::table('admin')->where('username', '=', $request->username);
        //if($user->save() && !$exist)
        //{
        //    session()->flash('message', 'Your account is created');
        //    return view('pages.login');
        //}
        //else
        //{
        //    session()->flash('message', 'Your registration is getting problem or finished register');
        //    return redirect('');
        //}

        //
        //            session()->flash('message', 'Your account is created');
        //
        //        } catch (\Illuminate\Database\QueryException $e) {
        //            //report($e);
        //            session()->flash('message', 'Your registration is getting problem');
        //
        //        }
        //
        //        return redirect()->route('login');
        //
    }
    //
    public function userlogout()
    {
        $history =  new History();
        $history->id = null;
        $history->action = auth()->user()->name." successfully logout with an ID: ".auth()->user()->id." at ".Carbon::now();
        $history->backend_id = auth()->user()->id;
        $history->save();
        Auth::logout();//Session::forget('name')
        //$_Session['name']
        return redirect()->route('login');
    }
}
