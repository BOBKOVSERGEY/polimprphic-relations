<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coin_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coins');
            $table->integer('price');
            $table->timestamps();
        });

        $packages = [
            '1 монета' => [1 => 5000],
            '3 монеты' => [3 => 13500],
            '10 монет' => [10 => 35000],
            '100 монет' => [100 => 250000],
        ];

        foreach ($packages as $name => $data) {
            foreach ($data as $coin => $price) {
                DB::table('coin_packages')
                    ->insert(
                        [
                            'name' => $name,
                            'coins' => $coin,
                            'price' => $price,
                        ]
                    );
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_packages');
    }
};
