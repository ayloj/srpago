<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cpMex extends Model
{
    protected $table = 'cp_mex';
    protected $primaryKey = 'id';
    protected $fillable = array( 'd_codigo', 'd_asenta', 'd_tipo_asenta', 'D_mnpio', 'd_estado',
        'd_ciudad', 'c_CP', 'c_tipo_asenta', 'c_mnpio', 'id_asenta_cpcons', 'd_zona', 'c_cve_ciudad');



}
