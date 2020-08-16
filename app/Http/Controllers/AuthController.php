<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Validation rules for login.
     *
     * @param Request $request
     * @return bool|\Illuminate\Support\MessageBag
     */
    public function validationRules(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'bail|required|email|exists:users',
            'password' => 'bail|required|password:api'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return true;
    }

    /**
     * Login logic.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $username = $request->json('username');
        $password = $request->json('password');

        $validation = $this->validationRules($request);

        if (Auth::attempt(['username' => $username, 'password' => $password]) && $validation) {
            return response()->json(['success' => 'logged-in']);
        }

        return response()->json(['fail' => $validation]);
    }

    /**
     * Logout logic.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
