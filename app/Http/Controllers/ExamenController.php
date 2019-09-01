<?php

namespace App\Http\Controllers;

use App\cpMex;
use Illuminate\Http\Request;

class ExamenController extends Controller
{

    public function home(Request $request)
    {
//error_log(date("d-m-Y ").__METHOD__.", dataCostoGasolina - ".print_r($request, true)."\n\n", 3, "../Logs/devLog.log");
        $rs = new cpMex();
        $estados = $rs->select('d_estado as estado')
            ->distinct()->get()->toArray();

        $toView = array(
            'estados' => $estados
        );
        return view('examen.home', $toView);
    }


    public function getmunicipio(Request $request){
error_log(date("d-m-Y ").__METHOD__.", dataCostoGasolina - ".print_r($request->estado, true)."\n\n", 3, "../Logs/devLog.log");
        $rs = new cpMex();
        $municipios = $rs->select('D_mnpio as municipio')
            ->where("d_estado", "=", $request->estado )
            ->distinct()->get()->toArray();


        return response()->json(['success'=>'Ok', "municipios" => $municipios]);
    }

}
