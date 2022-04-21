<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kategoris', 'user'];
    public function scopeFilter($query, $cari, $kategori)
    {
        $query->when($cari['search'] ?? false, function ($query, $cari) {
            $query->where('judul', 'like', '%' . $cari . '%')
                ->orWhere('isi', 'like', '%' . $cari . '%');
        });
        $query->when($cari['author'] ?? false, function ($query, $cari) {
            $query->whereHas('user', function ($query) use ($cari) {
                $query->where('name', 'like', '%' . $cari . '%');
            });
        });
        $query->when($kategori ?? false, function ($query, $kat) {
            foreach ($kat as $key) {
                $query->whereHas('kategoris', function ($query) use ($key) {
                    $query->where('slug', 'like', '%' . $key . '%');
                });
            }
        });
        return $query;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_post', 'post_id', 'kategori_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
