<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:purchase-list|purchase-create|purchase-edit|purchase-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:purchase-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:purchase-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:purchase-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $purchases = DB::table('purchases A')
            ->join('purchase_details B','b.purchase_id', '=', 'a.id')
            ->join('clients C', 'c.id', ' = ','a.client_id')
            ->select('a.id','a.fecha_compra' ,'c.nombre', DB::raw("COUNT( b.product_id ) AS items"), 'b.subtotal')
            ->groupBy('a.id', 'a.fecha_compra', 'c.nombre ')
            ->orderBy('a.id', 'DESC');
        return view('purchase.index', compact('purchases'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchases = new Purchase();
        $products = Product::all()->sortBy('nombre')
            ->pluck('nombre', 'id');

        $nombreRuta = Route::currentRouteName();

        return view('purchase.create', compact('purchases', 'products', 'nombreRuta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fecha_compra' => 'required',
            'client_id' => 'required',
        ]);

        Purchase::created($request->all());

        return redirect()->route('purchase.index')->with('success', 'Purchase creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('purchase.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('purchase.show', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $id)
    {
        request()->validate([
            'fecha_compra' => 'required',
            'client_id' => 'required',
        ]);
        $id->update($request->all());

        return redirect('purchase.index')->with('success', 'Purchase actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
