<?php

use App\Models\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('plan_validity');
            $table->mediumText('shortDescription');
            $table->longText('longDescription');
            $table->boolean('enabled')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        UserRole::firstOrCreate([
            'name' => 'Free',
            'slug' => 'free',
            'price' => 0,
            'plan_validity' => 3,
            'shortDescription' => 'Free Default Plan',
            'longDescription' => 'Free Default Plan',
            'enabled' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
