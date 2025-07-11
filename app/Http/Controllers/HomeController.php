<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        /** @var User $authUser */
        $authUser = Auth::user(); // Now Intelephense knows it's a User

        $user = $authUser->fresh(); // No more "undefined method" error

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->usertype == 1) {
            return view('admin.home');
        } else {
            return view('dashboard');
        }
    }
}
