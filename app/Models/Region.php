<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
        //la tabla a concetar a este modelo
        protected $table="regions";
        //la calve primaria de la tabla
        protected $primaryKey = "region_id";
        //omitir campos de auditoria
        public $timestamps = false; 
    use HasFactory;
    //relaciones entre regiones y continentes
    public function continente(){
        //belongsTo: Parametros
        //1 el modelo a Relacionar
        //2 FK del modelo a relacionar
        // en el modelo actual 
        return $this->belongsTo(Continent::Class,
                                'continent_id');   
}
    
     //relaciones entre region 1 - M 
     public function paises(){
        //hasMany: Parametros
        //1 el modelo a Relacionar
        //2 FK del modelo a relacionar
        // en el modelo actual 
        return $this->hasMany(Country::Class,
                                'region_id');  

     }
}