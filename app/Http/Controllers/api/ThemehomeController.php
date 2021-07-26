<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ThemehomeController extends Controller
{
    public function getcategory()
    {
        $all_category = DB::table('categories')->get();
        $all_subcategory = DB::table('categories_subcategory')->get();
        $all_childcategory = DB::table('categories_childcategory')->get();
        return response()->json($all_category);

    }
}
