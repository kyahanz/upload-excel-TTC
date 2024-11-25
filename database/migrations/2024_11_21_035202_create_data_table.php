<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->integer('WEEK')->nullable();
            $table->string('SITE_ID')->nullable();
            $table->string('SITE_NAME')->nullable();
            $table->string('TYPE')->nullable();
            $table->string('AC_GROUPING')->nullable();
            $table->string('AC_DESCRIPTION')->nullable();
            $table->bigInteger('ASSET_NUMBER')->nullable(); // Ubah menjadi bigInteger jika nilai lebih besar
            $table->integer('SUB')->nullable();
            $table->string('ASS_DESC')->nullable();
            $table->date('DPIS')->nullable();  // Ubah ke date jika DPIS adalah tanggal
            $table->integer('UL_FAR')->nullable();
            $table->bigInteger('COST')->nullable();
            $table->string('ACCUM_DEPRE')->nullable();
            $table->bigInteger('NBV')->nullable();
            $table->string('EQP_NUMBER')->nullable();
            $table->string('ASSET_CLASS')->nullable();
            $table->string('HW_SW')->nullable();
            $table->string('FUNCTIONAL_LOCATION')->nullable();
            $table->string('DIVISION_FUNC_LOC')->nullable();
            $table->string('WBS')->nullable(); // Nullable jika bisa NULL
            $table->string('PO_NUMBER')->nullable(); // Nullable jika bisa NULL
            $table->string('PO_DESC')->nullable(); // Nullable jika bisa NULL
            $table->string('VENDOR_NAME')->nullable(); // Nullable jika bisa NULL
            $table->string('VENDOR_GROUP')->nullable(); // Nullable jika bisa NULL
            $table->string('T_AREA')->nullable(); // Nullable jika bisa NULL
            $table->string('T_REG')->nullable(); // Nullable jika bisa NULL
            $table->string('GL_COST')->nullable(); // Nullable jika bisa NULL
            $table->string('EVAL1')->nullable(); // Nullable jika bisa NULL
            $table->string('EVAL2')->nullable(); // Nullable jika bisa NULL
            $table->string('CEK_NBV')->nullable();
            $table->string('AEID')->nullable();
            $table->string('AE_ID_DESCRIPTION')->nullable();
            $table->string('ASSET_CLASS_DESCRIPTION')->nullable();
            $table->string('NEW_AC_GROUPING')->nullable();
            $table->string('ASSET_KEY')->nullable();
            $table->string('NEW_NE_2024')->nullable();
            $table->string('NEW_NE_CODE')->nullable();
            $table->string('SID_NEID')->nullable();
            $table->string('NEID')->nullable();
            $table->string('NEID_NEW')->nullable();
            $table->string('SID_NEID2')->nullable();
            $table->string('FAR_AC_MATCH')->nullable();
            $table->string('PIC')->nullable(); // Nullable jika bisa NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
