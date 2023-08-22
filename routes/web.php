<?php

use App\Models\PaymentHistory;
use App\Models\VipTariff;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   $vip = VipTariff::query()->find(1);
    $purchase = $vip->purchase()->create();
    \App\Models\PaymentHistory::query()->create([
        'payment_gateway' => 'Ya',
        'status' => 'pending',
        'purchase_id' => $purchase->id,
        'amount' => $vip->price
    ]);

   $coin = \App\Models\CoinPackage::query()->find(2);
    $purchaseTwo = $coin->purchase()->create();
    \App\Models\PaymentHistory::query()->create([
        'payment_gateway' => 'Ya',
        'status' => 'pending',
        'purchase_id' => $purchaseTwo->id,
        'amount' => $coin->price
    ]);
   $paid = \App\Models\PaidAction::query()->find(7);
    $paid->purchase()->create();

    $history = PaymentHistory::query()->find(6);
    dd($history->purchase->purchaseable);
});
