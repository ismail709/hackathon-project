<?php

namespace App\Http\Controllers;

use App\Models\User; // Assuming you have a User model
use Illuminate\Http\Request; // Keep Request for logout and show forms if not using Form Requests for them
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest; // Import the new LoginRequest
use App\Http\Requests\RegisterRequest; // Import the new RegisterRequest

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Return the view for the login form
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \App\Http\Requests\LoginRequest  $request // Use LoginRequest for validation
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request) // Type-hint LoginRequest
    {
        // The validation is automatically handled by LoginRequest before this method is called.
        // If validation fails, it will redirect back with errors.

        // Attempt to authenticate the user
        // Auth::attempt returns true on success, false on failure
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Regeneration of the session ID to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect the user to their intended destination or a default dashboard
            return redirect()->intended('/'); // Change /dashboard to your desired post-login route
        }

        // If authentication fails (credentials don't match), throw a validation exception
        // This will redirect back with errors and input
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')], // Use Laravel's built-in authentication failed message
        ]);
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Return the view for the registration form
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request // Use RegisterRequest for validation
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterRequest $request) // Type-hint RegisterRequest
    {
        // The validation is automatically handled by RegisterRequest before this method is called.
        // If validation fails, it will redirect back with errors.

        // Create a new user record in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password before saving
        ]);

        // Log in the newly registered user
        Auth::login($user);

        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        // Redirect the user to their intended destination or a default dashboard
        return redirect()->intended('/'); // Change /dashboard to your desired post-registration route
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log out the currently authenticated user
        Auth::logout();

        // Invalidate the current session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page or login page
        return redirect('/'); // Change / to your desired post-logout route
    }
}
