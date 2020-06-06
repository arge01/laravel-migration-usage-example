<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unique();
            $table->string('tc_no')->unique();
            $table->string('no')->unique();

            $table->string('name');
            $table->string('tel')->nullable();
            $table->string('cep')->nullable();
            $table->string('images')->nullable();
            $table->text('address')->nullable();
            $table->text('email')->unique();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_cards');
    }
}
