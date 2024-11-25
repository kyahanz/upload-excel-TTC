<?php

namespace App\Imports;

use App\Models\Asset;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AssetImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    protected $week;

    // Tangkap nilai 'week' dari controller
    public function __construct($week)
    {
        $this->week = $week;
    }
    
    public function collection(Collection $rows)
{
    ini_set('max_execution_time', 900);
    ini_set('memory_limit', '1024M');

    $data = [];
    foreach ($rows as $row) {
        $dpis = null;
        if (!empty($row['dpis']) && is_numeric($row['dpis'])) {
            $dpis = Date::excelToDateTimeObject($row['dpis'])->format('Y-m-d');
        }

        $data[] = [
            'WEEK' => $this->week,
            'SITE_ID' => $row['site_id'],
            'SITE_NAME' => $row['site_name'],
            'TYPE' => $row['type'],
            'AC_GROUPING' => $row['ac_grouping'],
            'AC_DESCRIPTION' => $row['ac_description'],
            'ASSET_NUMBER' => $row['asset_number'],
            'SUB' => $row['sub'],
            'ASS_DESC' => $row['ass_desc'],
            'DPIS' => $dpis,
            'UL_FAR' => $row['ul_far'],
            'COST' => $row['cost'],
            'ACCUM_DEPRE' => $row['accum_depre'],
            'NBV' => $row['nbv'],
            'EQP_NUMBER' => $row['eqp_number'],
            'ASSET_CLASS' => $row['asset_class'],
            'HW_SW' => $row['hw_sw'],
            'FUNCTIONAL_LOCATION' => $row['functional_location'],
            'DIVISION_FUNC_LOC' => $row['division_func_loc'],
            'WBS' => $row['wbs'],
            'PO_NUMBER' => $row['po_number'],
            'PO_DESC' => $row['po_desc'],
            'VENDOR_NAME' => $row['vendor_name'],
            'VENDOR_GROUP' => $row['vendor_group'],
            'T_AREA' => $row['t_area'],
            'T_REG' => $row['t_reg'],
            'GL_COST' => $row['gl_cost'],
            'EVAL1' => $row['eval1'],
            'EVAL2' => $row['eval2'],
            'CEK_NBV' => $row['cek_nbv'],
            'AEID' => $row['aeid'],
            'AE_ID_DESCRIPTION' => $row['ae_id_description'],
            'ASSET_CLASS_DESCRIPTION' => $row['asset_class_description'],
            'NEW_AC_GROUPING' => $row['new_ac_grouping'],
            'ASSET_KEY' => $row['asset_key'],
            'NEW_NE_2024' => $row['new_ne_2024'] ?? '',
            'NEW_NE_CODE' => $row['new_ne_code'] ?? '',
            'SID_NEID' => $row['sid_neid'],
            'NEID' => $row['neid'],
            'NEID_NEW' => $row['neid_new'],
            'SID_NEID2' => $row['sid_neid'],
            'FAR_AC_MATCH' => $row['far_ac_match'],
            'PIC' => $row['pic'],
        ];

        // Insert batch ke database setiap 1000 baris
        if (count($data) === 5000) {
            Asset::insert($data);
            $data = []; // Kosongkan array untuk batch berikutnya
        }
    }

    // Sisipkan sisa data
    if (!empty($data)) {
        Asset::insert($data);
    }
}

}
