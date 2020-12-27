<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $timestamps = false;
    protected $table = 'data';
    protected $fillable = [
      'id_kontak',
      'date_data',
      'nama_file',
      'type'
    ];
}
