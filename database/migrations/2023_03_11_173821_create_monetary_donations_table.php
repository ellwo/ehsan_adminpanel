<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonetaryDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monetary_donations', function (Blueprint $table) {
            $table->id();
            $table->double('amount')->default(0);
            $table->integer('type')->default(0);
            $table->text('note')->nullable();
            $table->foreignId('donor_id')->nullable()->constrained('donors')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
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
        Schema::dropIfExists('monetary_donations');
    }
}
