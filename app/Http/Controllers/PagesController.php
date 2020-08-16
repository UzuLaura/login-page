<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Return login page view if guest, redirect to home page if auth user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getLoginPage()
    {
        if (Auth::user()) {
            return redirect(route('home'));
        }

        return view('pages.login');
    }

    /**
     * Return home page view if auth user, redirect to login page if guest.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getHome()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }

        return view('pages.home');
    }
}
