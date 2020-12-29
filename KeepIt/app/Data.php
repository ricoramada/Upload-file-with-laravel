<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
  protected $table = 'data';
    public $timestamps = false;
    protected $fillable = [
      'id_kontak',
      'date_data',
      'nama_file',
      'type',
      'path'
    ];
}
