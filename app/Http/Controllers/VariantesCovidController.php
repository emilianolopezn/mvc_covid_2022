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

        if ($nuevaVariante->save()) {
            //Despues de guardar, que me mande a la lista
            //de variantes
            return redirect()->route('variantes.index')->
                with('success','Variant was added succesfully');
        }
        return redirect()->route('variantes.index')->
            with('error','Could not add new variant');
                

    }

    public function edit($id) {
        $variante = Variante::find($id);
        $argumentos = array();
        $argumentos['variante'] = $variante;
        //find regresa un registro si lo encuentra
        //si no lo encuentra, regresa null
        if ($variante != NULL) {
            //Me lleva al form de edicion
            return view('variantes.edit', $argumentos);
        } 
        return redirect()->route('variantes.index')->
            with('error','Could not find variant');
    }

    public function update(Request $request, $id) {
        $variante = Variante::find($id);

        if ($variante) {
            //actualiza
            $variante->lineage = 
                $request->input('lineage');
            $variante->common_countries = 
                $request->input('common_countries');
            $variante->earliest_date = 
                $request->input('earliest_date');
            $variante->designated_number = 
                $request->input('designated_number');
            $variante->assigned_number =
                $request->input('assigned_number');
            $variante->description =
                $request->input('description');
            $variante->who_name =
                $request->input('who_name');

           if ($variante->save()) {
               return redirect()->
                route('variantes.edit',$id)->
                with('success','Variant was updated');
           }
           return redirect()->
                route('variantes.edit',$id)->
                with('error','Could not update variant');
        }
        return redirect()->route('variantes.index')->
            with('error', 'Could not find variant');
    }

    public function destroy($id) {
        $variante = Variante::find($id);
        if($variante) {
            //Si la encuentra la borra
            if($variante->delete()) {
                return redirect()->
                    route('variantes.index')->
                    with('success','Variant deleted');
            }
            return redirect()->
                route('variantes.index')->
                with('error','Could not delete variant');
        }
        return redirect()->route('variantes.index')->
            with('error','Could not find variant');
    }
}
