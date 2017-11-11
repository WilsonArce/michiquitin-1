<?php

namespace App\Http\Controllers\Cartera;

use Illuminate\Http\Request;
use App\Models\Cartera\Pago;
use App\Http\Controllers\Controller;
use DB;


use Session;

class PagoController extends Controller
{
    public function index(Request $request){
       if($request){
            //Buscar texto de busqueda para filtrar las categorias
            $query=trim($request->get('searchText'));
            $pagos=DB::table('pagos')
            //->join('facturas as f','fd.id_factura', '=', 'f.id_factura')
            ->select('id_deuda','valor','created_at')
            //->where('a.nombre','LIKE','%'.$query.'%')
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('id_deuda','desc')
            ->paginate(7);
             return view('cartera.pago.index',["pagos"=>$pagos,"searchText"=>$query]);
       }    	

    }




}
