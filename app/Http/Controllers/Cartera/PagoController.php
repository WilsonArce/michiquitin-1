<?php

namespace App\Http\Controllers\Cartera;

use Illuminate\Http\Request;
use App\Models\Cartera\Pago;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cartera\Paz_y_salvo;


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
            ->orderBy('id_pago','desc')
            ->paginate(7);
             return view('cartera.pago.index',["pagos"=>$pagos,"searchText"=>$query]);
       }    	

    }

    public function show(Request $request){
       if($request){
            //Buscar texto de busqueda para filtrar las categorias
            $query=trim($request->get('searchText'));
            $paz=DB::table('paz_y_salvos')
            //->join('facturas as f','fd.id_factura', '=', 'f.id_factura')
            ->select('id_paz_y_salvo','id_deuda','fecha','hora','concepto')
            //->where('a.nombre','LIKE','%'.$query.'%')
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('id_paz_y_salvo','desc')
            ->paginate(7);
             return view('cartera.pago.show',["paz"=>$paz,"searchText"=>$query]);
       }        

    }




}
