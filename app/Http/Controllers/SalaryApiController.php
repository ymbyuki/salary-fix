<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Salary;


class SalaryApiController extends Controller
{
    public function getYearAllSalary() {
        $year = date('Y');
        // $auth=auth()->user()->id;
        $auth=1;
        $user=Salary::where('user_id', $auth)
                    ->whereYear('date', $year)
                    ->orderBy('date', 'desc')
                    ->get();
        return $user;
    }
}
