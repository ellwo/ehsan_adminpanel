<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStateColumnToMaterialDonations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_donations', function (Blueprint $table) {
            //
            $table->integer('state')->default(0);
            $table->text('r_note')->nullable();
            $table->foreignId('resave_by')->nullable()->constrained('users','id')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_donations', function (Blueprint $table) {
            //
        });
    }
}
