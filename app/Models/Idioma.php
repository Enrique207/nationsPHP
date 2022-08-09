<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
        //la tabla a concetar a este modelo
        protected $table="languages";
        //la calve primaria de la tabla
        protected $primaryKey = "language_id";
        //omitir campos de auditoria
        public $timestamps = false; 
    use HasFactory;

     //ralacion entre idiomas y paises
     public function paises(){
        //belongtomany : parametros
        // 1 modelo a relacionar 
        // 2 la tabla pivote
        // 3 FK del modelo actual en el pigote
        // 4 la FK del modelo relacional el pivote
        return $this->belongsToMany(Country::Class,
                                    'country_languages',
                                    'language_id', 
                                    'country_id');


}
}