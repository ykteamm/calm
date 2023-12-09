<?php

use App\Enums\UserTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->tinyInteger('type')->default(UserTypeEnum::ADMIN);
            $table->string('username', 50)->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password');
            $table->timestamp('sms_verif_code_expires_at')->nullable();
            $table->timestamp('sms_verif_code_verified_at')->nullable();
            $table->string('sms_verif_code')->nullable();
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
