<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Redirect;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function usersList()
    {
        if(!Auth::check() && Auth::user()->type == 1) 
        {
            return Redirect::to('login');
        }
        
        $userData =DB::table('users')
        ->where('id', '!=', 1)
        ->get();
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users List"]];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        // return view('pages.page-users-list', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);

     return view( 'pages.page-users-list', ['userData' => $userData, 'breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);

    }

    public function usersView()
    {
        if(!Auth::check() && Auth::user()->type == 1) 
        {
            return Redirect::to('login');
        }
     
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users View"]];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.page-users-view', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }
    public function usersEdit($user_id)
    {
        if(!Auth::check() && Auth::user()->type == 1) 
        {
            return Redirect::to('login');
        }
         $userData =DB::table('users')
        ->where('id', '=', $user_id)
        ->get();
        foreach($userData as $data) {
            $password = $data->password;
        }
        $userData[0]->password = "1234565";

        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users Edit"]];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
        return view('pages.page-users-edit', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'userData' => $userData[0]]);
    }
    public function usersChangePassword($user_id) {
        if(!Auth::check() && Auth::user()->type == 1) 
        {
            return Redirect::to('login');
        }

        $updatedPassword =  DB::table('users')
        ->where('id', $user_id)
        ->update([
        'password' => Hash::make($_POST['password']),
        'updated_at'    => date("Y-m-d H:i:s")]);

       return response()->json(['message'=> 'Password successfully changed!']);
    }

    public function usersUpdate($user_id) {
        if(!Auth::check() && Auth::user()->type == 1) 
        {
            return Redirect::to('login');
        }

        
        $updatedPassword =  DB::table('users')
        ->where('id', $user_id)
        ->update([
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'type' => $_POST['type'],
        'updated_at'    => date("Y-m-d H:i:s")]);

       return response()->json(['message'=> 'User successfully changed!', 'name' => $_POST['name']]);

    }
    

}
