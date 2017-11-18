<?php

namespace App\Http\Controllers\Cartera;

use Illuminate\Http\Request;
use App\Models\Cartera\Pago;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cartera\Paz_y_salvo;
use App\Models\Cartera\Deuda;
use App\Models\Usuarios\User;
use PDF;


use Session;

class PagoController extends Controller
{
    public function index(Request $request){
       if($request){
            $query=$request->get('searchText');
            if (is_null($query)){
                $pagos = Pago::all();    
            }else{
                $user_id = User::where('id_tipo', $query)->first()->id;
                $data = User::whereId($user_id)->with('deuda.pagos')->get();
                //$deudas=Deuda::where('id_usuario', $user_id)->get();
                //$pagos = Deuda::where('id_usuario', $user_id)->get();
                $pagos=$data[0]->deuda->where('id_usuario','LIKE',$query);
            }            
             return view('cartera.pago.index',["pagos"=>$pagos,'searchText'=>$query]);
       }
	

    }      
    

    public function show(Request $request){
        $paz=Paz_y_salvo::all();
        return view('cartera.pago.show',["paz"=>$paz]);
              

    }

    public function downloadPDF(Request $request, $id){
        if($request){
            $paz=DB::table('paz_y_salvos as ps')
            ->join('deudas as d','ps.id_deuda', '=','d.id_deuda')
            ->select('ps.id_paz_y_salvo','ps.fecha','ps.hora', 'd.id_deuda','d.valor_a_pagar')
            ->where('id_paz_y_salvo','LIKE',$id)
            ->orderBy('d.id_deuda','desc')
            ->paginate(7);
            //
            $datos=DB::table('deudas as d')
            ->join('users as u','d.id_usuario','=','u.id')
            ->select('u.id_tipo','u.name')
            ->orderBy('d.id_deuda')
            ->get();
            //
             $pdf = PDF::loadView('cartera/pago/pdf',['paz'=>$paz, 'datos'=>$datos]);
             return $pdf->download('Paz_y_Salvo.pdf');
       }   
 
    }




}
