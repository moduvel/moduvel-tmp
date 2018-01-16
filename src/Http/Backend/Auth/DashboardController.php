<?php

namespace Moduvel\Core\Http\Backend\Auth;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('moduvel-core::backend.auth.dashboard.index');
    }
}