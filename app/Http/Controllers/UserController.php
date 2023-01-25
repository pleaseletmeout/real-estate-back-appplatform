<?php

namespace App\Http\Controllers;

use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\ActiveUser;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
   
    
    public function process_User(Request $request)
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
        
    }
    
}
