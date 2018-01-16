<?php

namespace Moduvel\Core\Http\Backend\NonAuth;

use Illuminate\Routing\Controller;
use Moduvel\Core\Entities\BackendUser;
use Moduvel\Core\Http\Requests\LoginFormRequest;
use Symfony\Component\HttpFoundation\Response;

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
            return $request->expectsJson()
                ? response()->json(['message' => 'Invalid Credentials'], Response::HTTP_BAD_REQUEST)
                : redirect()->back()->withErrors(['error' => 'Invalid Credentials']);
        }

        return $request->expectsJson()
                ? response()->json(['redirect' => locale().'.backend.dashboard'], Response::HTTP_ACCEPTED)
                : redirect()->route(locale().'.backend.dashboard');
    }
}