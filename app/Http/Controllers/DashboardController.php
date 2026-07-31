<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        
        return match (User::returnUserType())
        {
            1 => view('dashboard.administrador'),
            2 => view('dashboard.colaborador'),
            3 => view('dashboard.contratante'),
            default => abort(403),
        };

    }
}
