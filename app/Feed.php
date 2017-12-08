<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{

    protected $appends = ['created_at_description'];

    public function getCreatedAtDescriptionAttribute()
    {
        $createdAt = Carbon::parse($this->created_at);
        $diff = $createdAt->diffInYears();
        if ($diff > 0) {
            return $diff . ' tahun yang lalu.';
        }
        $diff = $createdAt->diffInMonths();
        if ($diff > 0) {
            return $diff . ' bulan yang lalu.';
        }
        $diff = $createdAt->diffInDays();
        if ($diff > 0) {
            return $diff . ' hari yang lalu.';
        }
        $diff = $createdAt->diffInHours();
        if ($diff > 0) {
            return $diff . ' jam yang lalu.';
        }
        $diff = $createdAt->diffInMinutes();
        if ($diff > 0) {
            return $diff . ' menit yang lalu.';
        }
        return 'Baru saja.';
    }

}