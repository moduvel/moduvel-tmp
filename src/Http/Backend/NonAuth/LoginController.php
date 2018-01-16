<?php

namespace Moduvel\Core\Http\Backend\NonAuth;

use Illuminate\Routing\Controller;
use Moduvel\Core\Entities\BackendUser;
use Moduvel\Core\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('moduvel-core::backend.non-auth.login.index');
    }

    public function store(LoginFormRequest $request)
    {
        if ( ! \Auth::guard('backend')->attempt($request->only('email', 'password')))
        {
            return redirect()->back()->withErrors([
                'error' => 'Invalid Credentials',
            ]);
        }

        return redirect()->route(locale().'.backend.dashboard');
    }
}