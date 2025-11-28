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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('role')->nullable();
            $table->text('surname')->nullable();
            $table->text('nationality')->nullable();
            $table->text('bank_account')->nullable();
            $table->text('paypal_account')->nullable();
            $table->text('price_of_subscription')->nullable();
            $table->text('profile_picture')->nullable();
            $table->text('cover_picture')->nullable();
            $table->text('Influencer_networks')->nullable();
            $table->text('Influencer_networks_profile_links')->nullable();
            $table->text('username_URL')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('earnings')->nullable();
            $table->integer('no_of_followers')->nullable();
            $table->tinyInteger('profile_picture_border_status')->default(1)->nullable();
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
