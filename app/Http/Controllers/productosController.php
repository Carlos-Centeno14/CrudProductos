<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Categoria;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //        $productos = producto::all();
//        $productos = producto::paginate(5);

        $producto=producto::with('categoria::id,nombre')->paginate(5);
        return view('productos.index',['productos' => $productos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=Categoria::all();
        return view('productos.create',['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nombre'=>'required | min:5|max:30',
            'descripcion'=>'required | min:5|max:100',
            'precio'=> ['required','numeric','regex:/^\d+(\.\d{1,2})?$/'],
            'categoria'=>'required|exists:categoris,id'
        ]);

        $producto = producto::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'categoria_id'=>$request->categoria,
        ]);
        session()->flash('status', 'Guardado Correctamente :) Producto: '.$request->nombre);
        return to_route('ProductosIndex');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto= producto::find($id);
        return view('productos.edit',['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'nombre'=>'required | min:5|max:30',
            'descripcion'=>'required | min:5|max:100',
            'precio'=> ['required','numeric','regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $producto= producto::find($id);
        if($producto)
        {
            $producto->nombre=$request->input('nombre');
            $producto->descripcion=$request->input('descripcion');
            $producto->precio=$request->input('precio');

            $producto->save();
        }
        session()->flash('statusA', 'Actualizado Correctamente :| Producto: '.$request->nombre);
        return to_route('ProductosIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto= producto::find($id);
        if($producto)
        {
            $producto->delete();
        }
        session()->flash('statusR', 'Eliminado Correctamente x_x ');
        return to_route('ProductosIndex');

    }
}
