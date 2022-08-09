<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla a concetar a este modelo
    protected $table="continents";
    //la calve primaria de la tabla
    protected $primaryKey = "continent_id";
    //omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    //relacion entre continente y region
    public function regiones(){
        //hasMany Parametros:
        //1. El modelo a relacionar
        //2. La FK del model actual en  
        // el modelo a relacionar
        return $this->hasMany(Region::class, 
                                'continent_id');


    }

    //relacion entre continente y sus paises:
    //El abuelo es el continente -- continent
    //El papá es la region -- regions
    //El nieto son los paises --country
    public function paises(){
        //hasManyThrough Parametros
        //1 Modelo Nieto
        //2 Modelo Papá
        //3 La FK del Abuelo en el papá
        //4 La FK del Papá en el nieto
        return $this->hasManyThrough(Country::Class,
                                    Region::Class,
                                    'continent_id',
                                    'region_id');
    }
}
