<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSupportChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_support_chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('support_user_id')->nullable();
            $table->text('message');
            $table->timestamp('seen_by_user')->nullable();
            $table->timestamp('seen_by_support_user')->nullable();
            $table->boolean('is_sended_by_user');
            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('support_user_id')->on('support_users')->references('id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_support_chats');
    }
}
