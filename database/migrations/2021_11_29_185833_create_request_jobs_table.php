<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('pass');
            $table->string('passport_series');
            $table->string('passport_number');
            $table->date('date');
            $table->string('depart');
            $table->string('depart_code');
            $table->foreignId('positions_id') -> constrained();
            $table->foreignId('education_id') -> constrained();
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
        Schema::dropIfExists('request_jobs');
    }
}
