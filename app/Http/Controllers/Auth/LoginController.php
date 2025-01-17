<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; 
use App\Models\User; 
use App\Models\Student; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected $redirectTo = '/home';

    protected function redirectTo()
    {
        
        if (Auth::check()) {
            return Auth::user()->role === 'admin' ? '/admin-dashboard' : '/home';
        }
        return '/login';
    }
    protected function authenticated(Request $request, $user)
    {
    return redirect()->route('home');
    }


    /**
     * Define custom login conditions.
     */
    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
        ];
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the social media provider's authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from social provider and log them in.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $user = User::where('email', $userSocial->getEmail())->first();

        if ($user) {
            // Log in existing user
            Auth::login($user);
            return redirect($this->redirectTo())->with('success', 'You are logged in with ' . ucfirst($provider));
        } else {
            // Create a new user record in the users table
            $newUser = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'user_type' => 'user',//sign default role as student
                'password' => Hash::make(Str::random(8)), 
            ]);

            // Create a corresponding entry in the students table with specific attributes
            user::create([
                'user_id' => $newUser->id, // Link to user record with foreign key
                'no_matriks' => $userSocial->getId(), 
                'name' => $userSocial->getName(),
                'facultyOffice' => null, 
                'course' => null,
                'status'=>'user',
                'email' => $userSocial->getEmail(),
                'password' => Hash::make(Str::random(8)), 
            ]);

            // Log in the new user
            Auth::login($newUser);
            return redirect($this->redirectTo())->with('success', 'You are registered and logged in with ' . ucfirst($provider));
        }
    }
}
