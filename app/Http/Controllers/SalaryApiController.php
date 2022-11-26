<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Salary;


class SalaryApiController extends Controller
{

    public function getYearAllSalary() {
        $year = date('Y');

        $user = Auth::user();
        print($user);
        dd($user);
        // $user=Salary::where('user_id', $auth)
        //             ->whereYear('date', $year)
        //             ->orderBy('date', 'desc')
        //             ->get();
        // return $user;
    }
}
