<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
              $user = auth()->user();
              $proveedor = Proveedor::where('user_id', $user->id)->with('user')->get();

        return view('proveedor',['proveedores' => $proveedor]);
    }

    public function guardar(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        $proveedor = new Proveedor([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'user_id' => $user->id,
        ]);

        $proveedor->save();

        return redirect()->route('proveedor')->with('success', 'Proveedor guardado exitosamente');
    }

    public function eliminar($id)
    {
        $proveedor = Proveedor::find($id);


        if (!$proveedor) {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }

        // Realiza la lógica de eliminación aquí
        $proveedor->delete();

        return redirect()->back()->with('success', 'Proveedor eliminado correctamente');


    }
    public function actualizar(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }

        // Validación de los campos actualizados
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        // Actualiza los campos del proveedor
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();

        return redirect()->back()->with('success', 'Proveedor actualizado correctamente');
    }

}

?>
