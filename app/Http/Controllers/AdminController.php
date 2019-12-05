<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Products;
use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getUser(Request $request)
    {
        return User::all();
    }

    /**
     * @param Request $request
     * @return Products[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProducts(Request $request)
    {
        return Products::all();
    }

    /**
     * @param Request $request
     * @return Report[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getReports(Request $request)
    {
        return Report::all();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getTablesList(Request $request)
    {
        $tab_list=array();
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            foreach ($table as $key => $value)
                $tab_list[]=array('rows'=>DB::table($value)->count(),'name'=>$value);
        }

        return $tab_list;
    }

    /**
     * @param Request $request
     * @return Orders[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getOrders(Request $request)
    {
        return Orders::all();
    }
}
