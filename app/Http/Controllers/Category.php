<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;
use App\Models\Lot;
class Category extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = CategoryModel::all();
        return view('categories.categories', ['categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $lots = Lot::all();
        return view('categories.addCategory', ['lots' => $lots]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        CategoryModel::create($request->validate([
            'name'=>'required|max:150|unique:categories',
            'lot_id'=>'required|integer'
        ]));

        return redirect(route('categories.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = CategoryModel::query()
            ->select()
            ->with('lot')
            ->where('id', '=', $id)
            ->first();
        $lots = Lot::query()
            ->select()
            ->where('id', '!=', $category->lot->id)
            ->get();
        return view('categories.editCategory', ['category' => $category, 'lots' => $lots]);
    }

    /**
     * @param Request $request
     * @param CategoryModel $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, CategoryModel $category)
    {
        $category->update($request->validate([
            'name'=>'required|max:150',
            'lot_id'=>'required|integer'
        ]));
        return redirect(route('categories.index'));
    }

    /**
     * @param CategoryModel $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(CategoryModel $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }
}
