<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipTariff extends Model
{
    use HasFactory;

    public function purchase()
    {
        return $this->morphMany(Purchase::class, 'purchaseable');
    }
}
