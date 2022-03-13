<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSupportQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_support_queries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('query_title', 255);
            $table->text('query_description');
            $table->string('query_ss_name', 100);
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamp('assigned_on_date')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('resolved_at');
            $table->string('remarks', 255);
            $table->unsignedBigInteger('closed_by')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('user_support_queries');
    }
}
