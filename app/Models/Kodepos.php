<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodepos extends Model
{
    protected $table = 'kodepos';
    protected $fillable = [
        'postal_code'
      ];
}
