<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showUserRegisterForm(){
        return view("components.pages.User.UserRegisterForm");
    }  /// END FUNCTION

    public function showCompanyRegisterForm(){
        return view("components.pages.Company.CompanyRegisterForm");
    }  /// END FUNCTION

    public function register(Request $request){

        $path = $request->path();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'image' => 'required|',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName =  time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('userprofile', $imageName, 'public');
            $image->move(public_path('userprofile'), $imageName);
            $imagePath = 'userprofile/' . $imageName;

        if($path === 'company/register'){
            try {
                $User = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role'=>'company',
                    'profileImg'=>$imagePath,
                ]);
        
                Auth::login($User);
                return redirect()->route('company.login.form')->with('success', 'Registration successful!');
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'email' => 'The email address is already registered.',
                ]);
            }  
        }else{
            try {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role'=> 'user',
                    'profileImg'=>$imagePath,
                ]);
                return redirect()->route('user.loginForm')->with('success', 'Registration successful!');
            } catch (\Throwable $th) {
                throw ValidationException::withMessages([
                    'email' => 'The email address is already registered.',
                ]);
            }
        }
    }
    }  /// END FUNCTION







    public function showUserLoginForm(){
        return view("components.pages.User.UserLoginForm");
    }  /// END FUNCTION

    public function showCompanyLoginForm(){
        return view("components.pages.Company.CompanyLoginForm");
    }  /// END FUNCTION

    public function login(Request $request){
        $path = $request->path();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if($path === 'company/login'){
                return redirect()->route('Company.add_jobsForm')->with('success', 'Registration successful!');
            }else{
                return redirect()->route('Home')->with('success', 'Registration successful!');
            }
        }else {
            return back()->withErrors(['email' => 'Invalid credentials or user not found']);
        }
    }  /// END FUNCTION
}

