<?php

namespace BolsaTrabajo\Http\Controllers\Auth;


use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use BolsaTrabajo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use BolsaTrabajo\Historial;
use BolsaTrabajo\Asistentes;
use BolsaTrabajo\Celula;


class MicelulaController extends Controller
{

    
    public function index()
    {
        $user = Auth::guard('web')->user(); // Usuario autenticado
        $celula = Celula::where('lider_id', $user->id)->first(); // Buscar célula del usuario

        if (!$celula) {
            return redirect()->back()->with('error', 'No tienes una célula asignada.');
        }

        $asistentes = Asistentes::where('estado', 1)
                    ->where('celula_id', $celula->id)
                    ->orderBy('nombre', 'asc')
                    ->get();

        return view('auth.micelula.index', compact('celula', 'asistentes'));
    }
}