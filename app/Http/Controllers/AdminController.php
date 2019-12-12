<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
    		 if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin' => '1'])) {
                    //echo "Success"; die;
                    // Session::put('adminSession', $data['email']);
                    return redirect('/admin/dashboard');
        	}else{
                    //echo "failed"; die;
                    return redirect('/admin')->with('flash_message_error','Usuario o contrasena invalida');
        	}
    	}
    	return view('admin.admin-login');
    }

    public function dashboard(){
        // if(Session::has('adminSession')){

        // }else{
        //     return redirect('/admin')->with('flash_message_error','Debes iniciar sesion');
        // }
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Has cerrado sesion');
    }

    public function settings(){
        return view('admin.settings');
    }
}
