<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagar_anugamen', function (Blueprint $table) {
            $table->id();
            $table->string('samiti_name');
            $table->string('address');
            $table->string('contact_number');
            $table->string('post');
            $table->string('cit_no');
            $table->string('issued_district');
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
        Schema::dropIfExists('nagar_anugamen');
    }
};
