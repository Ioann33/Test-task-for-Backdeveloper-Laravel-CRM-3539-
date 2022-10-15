<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot as LotModel;
use App\Models\Category;

class Lot extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $lots = LotModel::query()
            ->select()
            ->get();
        $categories = Category::query()
            ->select()
            ->get();
        return view('lots.lots', [
            'lots'=>$lots,
            'categories' => $categories
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('lots.addLot');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        LotModel::create($request->validate([
            'name'=>'required|max:150',
            'description'=>'required'
        ]));
        return redirect(route('lots.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $lot = LotModel::query()
            ->select()
            ->with('categories')
            ->where('id', '=', $id)
            ->first();
        return view('lots.showLot', ['lot'=>$lot]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $lot = LotModel::findOrFail($id);
        return view('lots.editLot', ['lot'=>$lot]);
    }

    /**
     * @param Request $request
     * @param LotModel $lot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, LotModel $lot)
    {
        $lot->update($request->validate([
            'name'=>'required|max:150',
            'description'=>'required',
        ]));
        return redirect(route('lots.index'));
    }

    /**
     * @param LotModel $lot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(LotModel $lot)
    {
        $lot->delete();
        return redirect(route('lots.index'));
    }
}
