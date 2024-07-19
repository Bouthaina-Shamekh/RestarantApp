<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
        //اظها صفحة تسجيل الدخول للموظف 

        public function index()
        {
            try {
                return view('Employee/Auth/login');
            } catch (\Exception $ex) {
                abort(404);
            }
        }
    
        //التحقق من عملية تسجيل الدخول
    
        public function store(Request $request)
        {
            try {
                $check = $request->all();
                if (Auth::guard('employee')->attempt([
                    'email' => $check['email'],
                    'password' => $check['password']
                ])) {
    
                    return redirect()->route('employee.index');
                } else {
                    return redirect()->route('employee.show.login')->with('login_error_message', 'error login please enter valid username and password');
                }
            } catch (\Exception) {
                abort(404);
            }
        }
    
        //تسجيل الخروج
    
        public function logout()
        {
            try {
                Auth::guard('employee')->logout();
                return redirect()->route('employee.show.login');
            } catch (\Exception) {
                abort(404);
            }
            
        }

}
