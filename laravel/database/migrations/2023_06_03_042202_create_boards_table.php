<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('content',1000);
            $table->softDeletes();
            $table->char('delete_flg',1)->default('0');
            $table->timestamps();
            // 참조 컬럼의 경우 데이터타입을 맞춰줘야함
            $table->bigInteger('write_user_id');
            // $table->foreignId('write_user_id')->constrained();
            $table->foreignId('write_user_id')->reference('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
