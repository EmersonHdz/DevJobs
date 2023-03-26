<?php

namespace App\Http\Controllers;


use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vacante $vacante)
    {
       return view('candidatos.index', [
           'vacante' => $vacante
       ]);
    }
}
