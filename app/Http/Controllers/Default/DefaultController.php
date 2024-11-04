<?php

namespace App\Http\Controllers\Default;

/**
 * component collectiion
 */

use App\Http\Controllers\Controller;

/**
 * middleware collection
 */

use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function __construct()
    {
    }

    /**
     * default view
     */
    public function index()
    {
        /**
         * checking authentication
         * if true then direct to redirect
         * if false then direct to login
         */
        if (Auth::check()) :
            return redirect('dashboard');
        else :
            return view('auth.login.index');
        endif;
    }
}
