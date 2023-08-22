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
        Schema::create('vip_tariffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('days');
            $table->integer('price');
            $table->timestamps();
        });

        $tariffs = [
            7 => 29000,
            30 => 69900,
            90 => 129900,
            365 => 299900,
        ];

        foreach ($tariffs as $days => $price) {
            DB::table('vip_tariffs')->insert(
                ['name' =>  $days . ' дней', 'days' =>  $days, 'price' => $price]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vip_tariffs');
    }
};
