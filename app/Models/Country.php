<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //la tabla a concetar a este modelo
    protected $table="countries";
    //la calve primaria de la tabla
    protected $primaryKey = "country_id";
    //omitir campos de auditoria
    public $timestamps = false; 
    use HasFactory;

    //ralacion M:M entre paises e idiomas
    public function idiomas(){
        //belongtomany : parametros
        // 1 modelo a relacionar 
        // 2 la tabla pivote
        // 3 FK del modelo actual en el pigote
        // 4 la FK del modelo relacional el pivote
        return $this->belongsToMany(Idioma::Class,
                                   'country_languages',
                                    'country_id',
                                'language_id'
                                )->withPivot('official');
    }
}
