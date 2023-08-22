<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CoinPackage extends Model
{
    use HasFactory;

    public function purchase(): MorphMany
    {
        return $this->morphMany(Purchase::class, 'purchaseable');
    }
}
