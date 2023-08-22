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
        Schema::create('paid_actions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coins');
            $table->integer('price');
            $table->tinyInteger('status')->default(true);
            $table->timestamps();
        });

        $actions = [
            'Сообщение в разделе мгновенных платных сообщений' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],
            'Дополнительная тема на форуме' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],
            'Дополнительное активное объявление в разделе “Барахолка” ' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],
            'Возможность 3 раза поднять объявление на первое место в разделе "Барахолка"' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],
            'Возможность закрепить объявление в ТОПе на неделю в разделе "Барахолка"' =>
                [
                    1 => [
                        2 => 10000
                    ]
                ],
            'Возможность отправить сообщение другому пользователю во время просмотра анкеты (если не друзья)' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],
            'Просмотр информации на 1 день  из раздела “взаимодействия с аккаунтом”' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],

            'Просмотр информации на 7 день  из раздела “взаимодействия с аккаунтом”' =>
                [
                    1 => [
                        3 => 15000
                    ]
                ],
            'Просмотр информации на 30 день  из раздела “взаимодействия с аккаунтом”' =>
                [
                    1 => [
                        5 => 25000
                    ]
                ],
            'Отправка стикера подарка' =>
                [
                    1 => [
                        1 => 5000
                    ]
                ],
            'Сообщение в разделе мгновенных платных сообщений рабочий аккаунт' =>
                [
                    2 => [
                        3 => 15000
                    ]
                ],
            'Тема на форуме' =>
                [
                    2 => [
                        5 => 25000
                    ]
                ],
            'Создание объявления в разделе УСЛУГИ' =>
                [
                    2 => [
                        5 => 25000
                    ]
                ],
            'Возможность 1 раз  поднять объявление в разделе УСЛУГИ' =>
                [
                    2 => [
                        2 => 10000
                    ]
                ],
            'Возможность закрепить объявление в ТОПе на 7 дней в разделе УСЛУГИ' =>
                [
                    2 => [
                        15 => 75000
                    ]
                ],
            'Возможность отправить сообщение  пользователю при просмотре анкет' =>
                [
                    2 => [
                        1 => 5000
                    ]
                ]
        ];
        foreach ($actions as $action => $data) {
            foreach ($data as $typeAccountId => $prices) {
                foreach ($prices as $coins => $amount) {
                    DB::table('paid_actions')->insert(
                        ['name' => $action, 'coins' => $coins, 'price' => $amount]
                    );
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_actions');
    }
};
