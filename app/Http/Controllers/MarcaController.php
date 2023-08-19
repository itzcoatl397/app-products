<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Marca;
use App\Models\MarcaEmpresa;

class MarcaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $marcas = MarcaEmpresa::where('user_id', $user->id)->get();
        $proveedores = Proveedor::where('user_id', $user->id)->with('user')->get();

        return view('marca',compact('marcas', 'proveedores'));
    }
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre_marca' => 'required|string|max:255',
            'proveedor' => 'required|exists:proveedors,id', // Asegura que el proveedor seleccionado exista en la tabla de proveedores
        ]);

        $user = auth()->user();

        $marca = new MarcaEmpresa();
        $marca->nombre = $request->input('nombre_marca');
        $marca->proveedor_id = $request->input('proveedor');
        $user = auth()->user();
        $marca->user_id = $user->id;
        $marca->save();

       return redirect()->back()->with('success', 'La Marca se  a guardado exitosamente');
    }
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'proveedor' => 'required|exists:proveedors,id',
        ]);

        $marca = MarcaEmpresa::findOrFail($id);
        $marca->nombre = $request->input('nombre');
        $marca->proveedor_id = $request->input('proveedor');
        $user = auth()->user();
        $marca->user_id = $user->id; // Agrega el ID del usuario autenticado

        $marca->save();

        return redirect()->back()->with('success', 'Proveedor actualizado correctamente');
    }

    public function eliminar($id)
    {
        $proveedor = MarcaEmpresa::find($id);


        if (!$proveedor) {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }

        // Realiza la lógica de eliminación aquí
        $proveedor->delete();

        return redirect()->back()->with('success', 'Proveedor eliminado correctamente');


    }
}

