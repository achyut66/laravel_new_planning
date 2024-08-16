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
        Schema::create('plan_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID

            // Define columns
            $table->string('program_name');
            $table->string('p_ward');
            $table->string('biniyojan_kisim');
            $table->string('anudan_kisim');
            $table->string('biniyojan_shrot');
            $table->decimal('anudan_rakam', 10, 2); // Decimal for monetary values
            $table->string('first');
            $table->string('second');
            $table->string('third');
            $table->string('fourth');
            $table->string('bajet_shrot');
            $table->string('rajpatra_no');
            $table->string('bajet_shirshak');
            $table->date('addedDate'); // Date column
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // Created_at and Updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_details');
    }
};
