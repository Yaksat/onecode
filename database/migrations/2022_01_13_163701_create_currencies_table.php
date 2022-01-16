<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            //$table->id();
            //Сделаем id не числом, а строкой названием валюты (чтобы в связанных таблицах сразу было видно привязанную валюту)
            $table->string('id')->unique();
            $table->timestamps();

            $table->string('name');
            $table->decimal('price')->unsigned();
            $table->boolean('active')->default(true);
            $table->timestamp('active_at')->nullable();
            $table->integer('sort')->unsigned()->default(999); // поле для сортировки, если хотим чтобы какие-то поля были вверху списка присваиваем им не 999, а цифру меньше
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
