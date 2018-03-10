<?php

namespace Moduvel\Core\Http\Backend\Auth;

use Illuminate\Routing\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        \Auth::guard('backend')->logout();

        return locale_route_redirect('backend.login');
    }
}