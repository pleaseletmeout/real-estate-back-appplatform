<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\History;
class PageController extends Controller
{
    //
    public function adminPage()
    {
        
        return view('index');
    }
    public function homePage()
    {
         
        $count = DB::table('users')->get()->count();
        $message = DB::table('contact_form')->get()->count();
        //$approve = DB::table('Property_Approval')->get()->count();
        $pending = DB::table('property')->where('property_status', '=', 0)->get()->count();
        $approve = DB::table('property')->where('property_status', '=', 1)->get()->count();
        
        //$pending = $pending - $approve;
        //$var = Session::get('name');
        if(Auth::check())
        {
            $user = Auth::user();
        }

        return view('pages.home', ['status' => $user, 'count' => $count, 'message' => $message, 'pending' =>$pending, 'approve' => $approve]);
    }
    
    
    
    
}
