<?php

namespace App\Http\Controllers;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActiveUser;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
class OperatorController extends Controller
{
    //
    public function userStatus()
    {
        $newUser = DB::table('users')->get();
        return view('pages.userStatus',['data' => $newUser]);
    }
    public function pendingApprove()
    {
        $property = DB::table('property')->where('property_status', '=', 0)->get();
        $prop_count = $property->count();
        $approved = DB::table('property')->where('property_status', '=', 1)->get();
        $app_count = $approved->count();
        //dd($property);
        //$user = DB::table('users')->where('user_id', '=', $property->user_id)->get('user_username');
        return view('pages.pending',['data' => $property, 'data_count' =>  $prop_count, 'approved' => $approved, 'app_count' => $app_count]);
    }
    public function enableUser($id)
    {
        ActiveUser::where('id', $id)->update(['status' => true]);
        return redirect('/users')->with('message', 'This'.$id.'is enabled');
    }
    public function disableUser($id)
    {
        ActiveUser::where('id', $id)->update(['status' => false]);
        return redirect('/users')->with('message', 'This'.$id.'is disabled');
    }
    public function approvePending($id)
    {
        Property::where('property_id', $id)->update(["property_status" => 1]);
        return redirect('/pending')->with('message', 'Successfully Approved this Property with an ID:'.$id);
    }
    public function findUser(Request $r)
    {
        $user = ActiveUser::where('email', 'like', '%'.$r->searching.'%')->orWhere('name', 'like', $r->searching.'%')->get();
        return view('pages.userStatus')->with(['data' => $user]);
    }
        public function findEstates(Request $r)
    {
        $property = Property::where('property_name', 'like', '%'.$r->searching.'%')->where('property_status', '=', 0)->get();
        $prop_count = $property->count();
        $approved = Property::where('property_name', 'like', '%'.$r->searching.'%')->where('property_status', '=', 1)->get();
        $app_count = $approved->count();
        return view('pages.pending')->with(['data' => $property, 'data_count' =>  $prop_count, 'approved' => $approved, 'app_count' => $app_count]);
    }
    public function contactMessage()
    {
        $contact = DB::table('contact_form')->orderBy('contact_id', 'desc')->take(10)->get();
        return view('pages.contactMessage',['data' => $contact]);
    } 
}
