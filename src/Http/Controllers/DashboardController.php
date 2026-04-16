<?php

declare(strict_types=1);

namespace Lmendes\Template\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('template::dashboard.index');
    }
}
