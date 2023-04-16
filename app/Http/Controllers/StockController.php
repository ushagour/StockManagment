<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Asset;
use App\Models\Team;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocks = Stock::all();
        return view('dashboard.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $assets = Asset::all()->pluck('name', 'id')->prepend("pleaseSelect", '');
        $teams = Team::all()->pluck('name', 'id')->prepend("pleaseSelect", '');

        return view('dashboard.stocks.create', compact(['assets','teams']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $stock = Stock::create($request->all());

        return redirect()->route('stock.index')->with('success','asset has been updated successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //

        return view('dashboard.stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function addAssetToStock(Stock $stock)
    {
        //
        $action      = request()->input('action', 'add') == 'add' ? 'add' : 'remove';
        $sign         = $action == 'add' ? '+' : '-';
        $stockAmount = request()->input('stock', 1);

        if ($stockAmount < 1) {
            return redirect()->route('stock.index')->with([
                'danger' => 'No item was added/removed. Amount must be greater than 1.',
            ]);
        }

    

        if ($action == 'add') {
            $stock->increment('current_stock', $stockAmount);
            $status = $stockAmount . ' item(-s) was added to stock.';
        }

        if ($action == 'remove') {
            if ($stock->current_stock - $stockAmount < 0) {
                return redirect()->route('stock.index')->with([
                    'danger' => 'Not enough items in stock.',
                ]);
            }

            $stock->decrement('current_stock', $stockAmount);
            $status = $stockAmount . ' item(-s) was removed from stock.';
        }

        return redirect()->route('stock.index')->with([
            'warning' => $status,
        ]);
    }

}
