<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variante;

class VariantesCovidController extends Controller
{
    public function index() {
        $variantes = Variante::all();

        $argumentos = array();
        $argumentos['variantes'] = $variantes;

        return view('variantes.index', $argumentos);
    }

    public function create() {
        return view('variantes.create');
    }

    public function store(Request $request) {
        $nuevaVariante = new Variante();
        //Izq es la columna de la BD
        //Der es el name del input del formulario
        $nuevaVariante->lineage = 
            $request->input('lineage');
        $nuevaVariante->common_countries =
            $request->input('common_countries');
        $nuevaVariante->earliest_date =
            $request->input('earliest_date');
        $nuevaVariante->designated_number =
            $request->input('designated_number');
        $nuevaVariante->assigned_number =
            $request->input('assigned_number');
        $nuevaVariante->description =
            $request->input('description');
        $nuevaVariante->who_name =
            $request->input('who_name');

        $nuevaVariante->save();

        //Despues de guardar, que me mande a la lista
        //de variantes
        return redirect()->route('variantes.index');        

    }
}
