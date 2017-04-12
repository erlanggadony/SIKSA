<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historysurat extends Model
{
    //
    public function pesanansurats(){
      return $this->belongsTo(PesananSurat::class);
    }
}
