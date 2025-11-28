<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageIncludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_includes', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->nullable();
            $table->text('Available')->nullable();
            $table->text('Unlimited')->nullable();
            $table->text('twenty_four_hour_Free')->nullable();
            $table->text('Free')->nullable();
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
        Schema::dropIfExists('package_includes');
    }
}
