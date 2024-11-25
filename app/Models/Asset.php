<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    // Tentukan nama tabel, jika nama tabel tidak sesuai konvensi Laravel (plural dari nama model)
    protected $table = 'assets';

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'SITE_ID',
        'WEEK',
        'SITE_NAME',
        'TYPE',
        'AC_GROUPING',
        'AC_DESCRIPTION',
        'ASSET_NUMBER',
        'SUB',
        'ASS_DESC',
        'DPIS',
        'UL_FAR',
        'COST',
        'ACCUM_DEPRE',
        'NBV',
        'EQP_NUMBER',
        'ASSET_CLASS',
        'HW_SW',
        'FUNCTIONAL_LOCATION',
        'DIVISION_FUNC_LOC',
        'WBS',
        'PO_NUMBER',
        'PO_DESC',
        'VENDOR_NAME',
        'VENDOR_GROUP',
        'T_AREA',
        'T_REG',
        'GL_COST',
        'EVAL1',
        'EVAL2',
        'CEK_NBV',
        'AEID',
        'AE_ID_DESCRIPTION',
        'ASSET_CLASS_DESCRIPTION',
        'NEW_AC_GROUPING',
        'ASSET_KEY',
        'NEW_NE_2024',
        'NEW_NE_CODE',
        'SID_NEID',
        'NEID',
        'NEID_NEW',
        'SID_NEID2',
        'FAR_AC_MATCH',
        'PIC',
    ];

    // Jika kolom tanggal harus menggunakan tipe data 'date' untuk kolom DPIS
    protected $dates = [
        'DPIS',
    ];
}
