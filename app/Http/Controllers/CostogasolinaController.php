<?php

namespace App\Http\Controllers;

use App\cpMex;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CostogasolinaController extends Controller
{
    private $ws_costoGasolina = "https://api.datos.gob.mx/v1/precio.gasolina.publico";
    private $wsResponse;
    private $db_cp;
    private $estado;
    private $municipio;

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio): void
    {
        $this->municipio = $municipio;
    }


    /**
     * Display resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(Request $request)
    {
        $dataFormatResponse = array();

        //Selecciono las condiciones para la consulta, segun los parametros enviados
        $rs = new cpMex();
        $rs = $rs->select('d_estado as estado', 'D_mnpio as municipio', 'd_codigo as cp');
        if(isset($request->estado)){
            $rs = $rs->where("d_estado","=",$request->estado);
        }
        if(isset($request->municipio)){
            $rs = $rs->where("D_mnpio","=",$request->municipio);
        }
        if(isset($request->precio)){
            //este para metro sera tarbajado con JS
        }
        //Obteniendo el record set de la BD
        $this->db_cp = $rs->distinct()->get()->toArray();

        if(count($this->db_cp) > 0){
            //Set estado y municipio
            $this->setEstado($this->db_cp[0]['estado']);
            $this->setMunicipio($this->db_cp[0]['municipio']);
            //Consultar WS de costo gasolina
            $this->wsResponse = $this->consultaCostoGasolina();
            $dataCostoGasolina = $this->findCp();

            $dataFormatResponse = $this->formatResponse($dataCostoGasolina);

        }
        return response()->json([
           "success" => true,
            "data" => $dataFormatResponse
        ]);
    }

    /**
     * Metodo para consumir el web service del costo de gasolina
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function consultaCostoGasolina(){
        $costoResponse = array();
        $client = new Client();
        $response = $client->request('GET', $this->ws_costoGasolina);
        $statusCode = $response->getStatusCode();
        $bodyResp = $response->getBody()->getContents();
        if(count($bodyResp) > 0 ){
            $costoResponse = json_decode($bodyResp, true);
            $costoResponse = $costoResponse['results'];
        }
        return $costoResponse;
    }

    /**
     * Buscar el CP en la respuesta del WS de costo de gasolina
     */
    private function findCp(){
        $dataCostoGasolina = array();
        for ($i = 0; $i < count($this->wsResponse); $i++){//Array de la respuesta del WS costo de gasolina
            foreach ($this->db_cp as $cps){//Array de CP's de la BD
                    if($this->wsResponse[$i]['codigopostal'] == $cps['cp']){//Elemento del array de costo de gasolina
                        //eliminar el elemento $data del arreglo y salvarlo en el $dataCostoGasolina
                        $dataCostoGasolina[] = $this->wsResponse[$i];
                        unset($this->wsResponse[$i]);
                        break;
                    }
            }
        }

        return $dataCostoGasolina;
    }

    /**
     * Metodo para formatear las datos de acuerdo  a la respuesta requerida
     * @param $dataCostoGasolina
     * @return array
     */
    private function formatResponse($dataCostoGasolina){
        $response = array();
        foreach ($dataCostoGasolina as $data){
            $response[] = array(
                "id" => $data['_id'],
                "frc" => $data['rfc'],
                "razonsocial" => $data['razonsocial'],
                "date_insert" => $data['date_insert'],
                "numeropermiso" => $data['numeropermiso'],
                "fechaaplicacion" => $data['fechaaplicacion'],
                "permisoid" => $data['﻿permisoid'],
                "longitude" => $data['longitude'],
                "latitude" => $data['latitude'],
                "codigopostal" => $data['codigopostal'],
                "calle" => $data['calle'],
                "colonia" => $data['colonia'],
                "municipio" =>  $this->getMunicipio(),
                "estado" => $this->getEstado(),
                "regular" => $data['regular'],
                "premium" => $data['premium'],
                "dieasel" => $data['dieasel']
            );
        }

        return $response;
    }
}
