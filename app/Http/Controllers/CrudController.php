<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index(){
        $data = DB::select('SELECT * FROM tienda WHERE delete_tienda = 0');
        for ($i=0; $i < count($data); $i++) { 
            if (!preg_match('/^([1-9]|1[0-9]|2[0-9]|3[0-1])\/([1-9]|1[0-2])\/202[0-5]$/', $data[$i]->fecha_apertura)) {
                $date = new DateTime($data[$i]->fecha_apertura);
                $data[$i]->fecha_apertura = $date->format('d-m-Y');
            }
        }
        return view("welcome")->with("data", $data);
    }

    public function products(){
        $data = DB::select('SELECT producto.sku, producto.nombre, producto.descripcion, producto.valor, tienda.nombre AS tienda, producto.imagen FROM producto INNER JOIN tienda ON producto.tienda = tienda.id');
        return view("product")->with("data", $data);
    }

    public function createStore(Request $request){

        try {
            $sql = DB::insert("INSERT INTO tienda(nombre, fecha_apertura) VALUES (?, ?)", [
                $request->txtname,
                $request->txtfecha,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return back()->with("add", "Tienda añadida correctamente");
        } else {
            return back()->with("false", "Error al registrar");
        }
        
    }

    public function editStore(Request $request){

        try {
            $sql = DB::insert("UPDATE tienda SET nombre = ?, fecha_apertura = ? WHERE id = ?", [
                $request->txtname,
                $request->txtfecha,
                $request->txtid,
            ]);

            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql) {
            return back()->with("updated", "Tienda actualizada correctamente");
        } else {
            return back()->with("falseUpdate", "Error al actualizar");
        }
        
    }

    public function deleteStore(Request $request){

        try {
            $sql = DB::insert("UPDATE tienda SET delete_tienda = 1 WHERE id = ?", [
                $request->txtid,
            ]);

        } catch (\Throwable $th) {
            $sql = 0;
        }

        

        if ($sql) {
            return back()->with("deleted", "Tienda eliminada correctamente");
        } else {
            return back()->with("falseDelete", "Error al eliminar");
        }
        
    }
}
