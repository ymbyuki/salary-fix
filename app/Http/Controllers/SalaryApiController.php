<?php
/*
|--------------------------------------------------------------------------
| APIコントローラ
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Salary;


class SalaryApiController extends Controller
{
    function __construct() {
        $this->salary = new Salary;
    }

    public function initIndexPage () {
        $totalCost = $this->totalCost();
        $totalThisMonthCost = $this->totalThisMonthCost();
        $result = [
            'totalCost' => $totalCost,
            'totalThisMonthCost' => $totalThisMonthCost,
        ];
        return $result;
    }

    /**
     * 今年度の全データ
     */
    public function getYearAllSalary() {
        $data = $this->salary->getYearAllSalary();
        return $data;
    }

    /**
     * 今月の全データ
     */
    public function getThisMonthSalary() {
        $data = $this->salary->getThisMonthSalary();
        return $data;
    }
    

    //個別詳細
    public function getSalary(Request $request) {
        $id = $request->id;
        $salary=Salary::where('id', $id)->first();
        return $salary;
    }
    


    /**
     * 今年の合計
     */
    public function totalCost() {
        $data = $this->salary->totalCost();
        return $data;
    }

    
    /**
     * 今月の合計
     */
    public function totalThisMonthCost() {
        $data = $this->salary->totalThisMonthCost();
        return $data;
    }


    /**
     * 全データ取得
     */
    public function getAllSalary() {
        $data = $this->salary->getAllSalary();
        return $data;
    }


}
