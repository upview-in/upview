<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('email', 255)->unique();
            $table->unsignedTinyInteger('country_id')->nullable();
            $table->decimal('mobile_number', 12, 0)->nullable();
            $table->date('birth_date')->nullable();
            $table->foreignId('local_lang')->constrained();
            $table->string('address', 1024)->nullable();
            $table->string('city', 35)->nullable();
            $table->string('state', 60)->nullable();
            $table->foreignId('country_id')->constrained()->nullable();
            $table->string('pincode', 11)->nullable();
            $table->tinyInteger('currency')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('enabled')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
