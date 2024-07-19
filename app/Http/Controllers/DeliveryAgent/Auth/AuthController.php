<?php

namespace App\Http\Controllers\DeliveryAgent\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
        //اظها صفحة تسجيل الدخول لعامل التوصيل 

        public function index()
        {
            try {
                return view('DeliveryAgent/Auth/login');
            } catch (\Exception $ex) {
                abort(404);
            }
        }
    
        //التحقق من عملية تسجيل الدخول
    
        public function store(Request $request)
        {
            try {
                $check = $request->all();
                if (Auth::guard('deliveryAgent')->attempt([
                    'email' => $check['email'],
                    'password' => $check['password']
                ])) {
    
                    return redirect()->route('deliveryAgent.index');
                } else {
                    return redirect()->route('deliveryAgent.show.login')->with('login_error_message', 'error login please enter valid username and password');
                }
            } catch (\Exception) {
                abort(404);
            }
        }
    
        //تسجيل الخروج
    
        public function logout()
        {
            try {
                Auth::guard('deliveryAgent')->logout();
                return redirect()->route('deliveryAgent.show.login');
            } catch (\Exception) {
                abort(404);
            }
            
        }

}
