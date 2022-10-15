<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;
class ApiController extends Controller
{
    public function filtered(Request $request){
        $categories = json_decode($request->getContent(), true);

        $categories = CategoryModel::query()
            ->with('lot')
            ->whereIn('id', $categories)
            ->get();
        return response()->json($categories);

    }

}
