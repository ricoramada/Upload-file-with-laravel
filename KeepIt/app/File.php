<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = 'file';
    public $timestamps = false;
    protected $fillable = [
      'nama_file'
    ];
}
