<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, $filter) {
        $query->when($filter ?? false, function($query, $barang) {
            return $query->where(function($query) use ($barang) {
                $query->where('name', 'like', '%' . $barang . '%');
            });
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
