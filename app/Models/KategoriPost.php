<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPost extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategori_post';
    public $timestamps = false;
}
