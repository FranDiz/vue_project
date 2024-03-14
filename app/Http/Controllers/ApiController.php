<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Canciones;
use Illuminate\Http\Request;                                

class ApiController extends Controller
{
    public function index(){
        $canciones = Canciones::with('user')->get();
        return response()->json($canciones);
}
}