<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActiveUser;
use App\Models\Property;
use App\Models\User;
use App\Models\Account;
class AdminController extends Controller
{
    //
    public function resetAdminPass()
    {
        $adminData = DB::table('admins')->where('name', '!=', 'admin')->get();
        return view('pages.resetPassword', ['data' => $adminData]);
    }
    public function addBackend()
    {
        return view('pages.addUser');
    }
    public function changeRole($id, $role)
    {
        if($id != 5)
        {
            DB::table('admins')->where('id', $id)->update(['role' => $role]);
        return redirect('/reset')->with('message', 'user'.$id.'and role change to'.$role);
        }
        else
        {
            return redirect('/reset')->with('message', 'action denied');
        }
        
    }
    public function changePass($id)
    {
        if($id != 5)
        {
            return view('pages.changePass', ['id' => $id]);
        }
        else
        {
            return redirect('/reset');
        }
        
    }
    public function editPass(Request $r)
    {
        if($r->name == $r->password)
        {
            
            User::where('id', $r->id)->update(['password' => bcrypt($r->password)]);
            return redirect()->route('getBack')->with('message', 'Password has been reset');
        }
        else 
        {
            return redirect('/newPass/'.$r->id);
        }
    }
    public function remBackend()
    {
        $data = DB::table('admins')->get();
        return view('pages.remBackend', ['data' => $data]);
    }
    public function vHistory()
    {
        $data = Account::orderBy('id', 'desc')->take(10)->get();
        return view('pages.history',['data'=>$data]);
    }
    public function rmUser()
    {
        $data = ActiveUser::orderBy('id', 'desc')->get();
        return view('pages.rmUser', ['data' => $data]);
    }
    public function delAd($id)
    {   if($id != 5)
        {
            $data = DB::table('admins')->where('id', $id)->delete();
            return redirect(route('rmBack'));
        }
        else 
        {
            return redirect(route('rmBack'));
        }
        
    }
    public function delUser($id)
    {
        ActiveUser::where('id', $id)->delete();
        return redirect(route('rmUserBack'));
    }
}
