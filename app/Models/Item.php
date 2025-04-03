<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    // Log Acitivity
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('item_logs')
            ->logOnly(['*']) 
            ->logOnlyDirty()
            ->setDescriptionForEvent(function (string $eventName) {
                $namaPetugas = Auth::user()->name ?? 'Guest';
                return "{$namaPetugas} " . $this->getCustomEventName($eventName) . " data barang {$this->name}";
            });
    }

    private function getCustomEventName(string $eventName): string
    {
        return match ($eventName) {
            'created' => 'menambahkan',
            'updated' => 'mengubah',
            'deleted' => 'menghapus',
            default => ''
        };
    }
    // Akhir Log Acitivity

    public function scopeFilter($query, $filter)
    {
        $query->when($filter ?? false, function ($query, $barang) {
            return $query->where(function ($query) use ($barang) {
                $query->where('name', 'like', '%' . $barang . '%');
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
