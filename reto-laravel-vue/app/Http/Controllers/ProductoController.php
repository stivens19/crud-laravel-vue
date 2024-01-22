<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::select('id','nombre','precio','stock','categoria_id')->with('categoria')->get();
        return response()->json([
            'success'=>true,
            'data'=>$productos
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required|numeric',
            'stock'=>'required|numeric',
            'categoria_id'=>'required|integer'
        ]);
        $producto=new Producto();
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->categoria_id=$request->categoria_id;
        $producto->save();
        return response()->json([
            'success'=>true,
            'data'=>$producto->load('categoria')
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return response()->json([
            'success'=>true,
            'data'=>$producto
        ],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required|numeric',
            'stock'=>'required|numeric',
            'categoria_id'=>'required|integer'
        ]);
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->categoria_id=$request->categoria_id;
        $producto->save();
        return response()->json([
            'success'=>true,
            'data'=>$producto->load('categoria')
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json([
            'success'=>true,
            'data'=>$producto,
            'message'=>'Registro eliminado correctamente'
        ],200);
    }
}
