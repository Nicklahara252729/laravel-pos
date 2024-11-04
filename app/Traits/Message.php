<?php

namespace App\Traits;

/**
 * import helper
 */

use App\Helpers\CheckerHelpers;

trait Message
{
    public function outputMessage(string $type, string $value = null)
    {
        $key  = "type";
        $data = [
            [
                // data ada atau kosong
                'type'    => 'data',
                'message' => ($value > 0) ? "data found" : "data empty"
            ],
            [
                // data tidak ditemukan
                'type'    => 'not found',
                'message' => 'data ' . $value . ' tidak ditemukan'
            ],
            [
                // data berhasil di simpan
                'type'    => 'saved',
                'message' => 'data ' . $value . ' berhasil disimpan'
            ],
            [
                // data gagal disimpan
                'type'    => 'unsaved',
                'message' => 'data ' . $value . ' gagal disimpan'
            ],
            [
                // data berhasil di ubah
                'type'    => 'updated',
                'message' => 'data ' . $value . ' berhasil diubah'
            ],
            [
                // data gagal diubah
                'type'    => 'update fail',
                'message' => 'data ' . $value . ' gagal diubah'
            ],
            [
                // data suda ada
                'type'    => 'exist',
                'message' => 'data ' . $value . ' sudah ada / terdaftar'
            ],
            [
                // data berhasil di hapus
                'type'    => 'deleted',
                'message' => 'data ' . $value . ' berhasil dihapus'
            ],
            [
                // data gagal di hapus
                'type'    => 'undeleted',
                'message' => 'data ' . $value . ' gagal dihapus'
            ],
            [
                // data berhasil di hapus permanen
                'type'    => 'deleted permanent',
                'message' => 'data ' . $value . ' berhasil dihapus permanen'
            ],
            [
                // data gagal di hapus permanen
                'type'    => 'undeleted permanent',
                'message' => 'data ' . $value . ' gagal dihapus permanen'
            ],
            [
                // format file tidak didukung
                'type'    => 'unsupported',
                'message' => 'format file yang di upload tidak didukung'
            ],
            [
                // directori tidak ditemukan
                'type'    => 'directory',
                'message' => 'directori tidak ditemukan'
            ],
            [
                // logout
                'type'    => 'logout',
                'message' => 'Successfully logged out'
            ],
            [
                // restore
                'type'    => 'restore',
                'message' => 'Successfully restore data'
            ],
            [
                // restore fail
                'type'    => 'restore fail',
                'message' => 'unsuccessfully restore data'
            ],
            [
                // invalid data
                'type'    => 'invalid',
                'message' => 'invalid credential'
            ],
            [
                // forbidden
                'type'    => 'forbidden',
                'message' => 'Access is forbidden to the requested.'
            ],
            [
                // verification
                'type'    => 'verification',
                'message' => 'Kode verifikasi ' . $value . ' berhasil dikirim'
            ],
            [
                // export
                'type'    => 'exported',
                'message' => $value . ' berhasil di export'
            ],
            [
                // import
                'type'    => 'imported',
                'message' => $value . ' berhasil di import'
            ],
            [
                // import fail
                'type'    => 'fail import',
                'message' => $value . ' gagal di import'
            ],
            [
                // gagal dikirm
                'type'    => 'unsend',
                'message' => $value . ' gagal dikirim'
            ],
            [
                // verified
                'type'    => 'verified',
                'message' => $value . ' berhasil diverifikasi'
            ],
            [
                // unmatch
                'type'    => 'unmatch',
                'message' => $value . ' tidak sesuai'
            ],
        ];

        $filteredArray = array_filter($data, function ($item) use ($key, $type) {
            return $item[$key] === $type;
        });

        return ucwords(array_values($filteredArray)[0]['message']);
    }

    /**
     * set for log
     */
    protected function setForLog(string $table, string $value)
    {
        try {
            $checkerHelpers = new CheckerHelpers;
            if ($table == 'daftar pegawai') :
                $getData = $checkerHelpers->userChecker(['uuid_user' => $value]);
                $value = 'daftar pegawai ' . $getData->name;
            elseif ($table == 'general setting assign') :
                $getData = $checkerHelpers->generalSettingAssignChecker(['uuid_general_setting_assign' => $value]);
                $value = $getData->setting_status;
            elseif ($table == 'kategori bahan') :
                $getData = $checkerHelpers->ingredientCategoryChecker(['uuid_ingredient_category' => $value]);
                $value = 'kategori bahan ' . json_encode($getData);
            elseif ($table == 'daftar outlet') :
                $getData = $checkerHelpers->outletChecker(['uuid_outlet' => $value]);
                $value = 'outlet ' . json_encode($getData);
            elseif ($table == 'akses') :
                $getData = $checkerHelpers->accessChecker(['uuid_access' => $value]);
                $value = 'akses ' . json_encode($getData);
            elseif ($table == 'pin akses') :
                $getData = $checkerHelpers->pinAccessChecker(['uuid_user' => $value]);
                $value = 'pin akses ' . json_encode($getData);
            elseif ($table == 'produk gratuity') :
                $getData = $checkerHelpers->gratuityChecker(['uuid_gratuity' => $value]);
                $value = 'gratuity ' . json_encode($getData);
            elseif ($table == 'kategori produk') :
                $getData = $checkerHelpers->categoryChecker(['uuid_category' => $value]);
                $value = 'kategori produk ' . json_encode($getData);
            elseif ($table == 'pajak produk') :
                $getData = $checkerHelpers->taxChecker(['uuid_tax' => $value]);
                $value = 'pajak produk ' . json_encode($getData);
            elseif ($table == 'tipe penjualan') :
                $getData = $checkerHelpers->salesTypeChecker(['uuid_sales_type' => $value]);
                $value = 'tipe penjualan ' . json_encode($getData);
            elseif ($table == 'diskon produk') :
                $getData = $checkerHelpers->discountChecker(['uuid_discount' => $value]);
                $value = $getData->discount_name;
            elseif ($table == 'daftar produk') :
                $getData = $checkerHelpers->itemChecker(['uuid_item' => $value]);
                $value = 'produk ' . $getData->product_name;
            elseif ($table == 'modifier') :
                $getData = $checkerHelpers->modifierChecker(['uuid_modifier' => $value]);
                $value = 'modifier ' . $getData->modifier_name;
            elseif ($table == 'modifier') :
                $getData = $checkerHelpers->modifierChecker(['uuid_modifier' => $value]);
                $value = 'modifier ' . $getData->modifier_name . ' item ' . $getData->product_name;
            elseif ($table == 'daftar bahan') :
                $getData = $checkerHelpers->daftarBahanChecker(['uuid_ingredient_library' => $value]);
                $value = 'bahan ' . $getData->ingredient_name;
            elseif ($table == 'modifier ingredient') :
                $getData = $checkerHelpers->modifierIngredientChecker(['uuid_modifier_ingredient' => $value]);
                $value = 'bahan modifier ingredient';
            elseif ($table == 'promo produk') :
                $getData = $checkerHelpers->promoChecker(['uuid_promo' => $value]);
                $value = 'promo ' . $getData->promo_name;
            elseif ($table == 'paket bundle') :
                $getData = $checkerHelpers->promoChecker(['uuid_bundle_package' => $value]);
                $value = 'paket bundle ' . $getData->bundle_name;
            elseif ($table == 'profile') :
                $getData = $checkerHelpers->userChecker(['uuid_user' => $value]);
                $value = json_encode($getData);
            elseif ($table == 'receipt') :
                $getData = $checkerHelpers->receiptSettingChecker(['uuid_outlet' => $value]);
                $value = json_encode($getData);
            elseif ($table == 'invoice') :
                $getData = $checkerHelpers->invoiceChecker(['uuid_invoice' => $value]);
                $value = json_encode($getData);
            endif;
        } catch (\Exception $e) {
            $value  = $e->getMessage();
        }

        return $value;
    }

    /**
     * message for log
     */
    public function outputLogMessage(string $type, string $value = null, string $moreValue = null, string $table = null)
    {
        if ($type == 'update' || $type == 'delete') :
            $value = $this->setForLog($table, $value);
        endif;

        $key  = "type";
        $data = [
            [
                // login success
                'type'    => 'login success',
                'action'  => 'login berhasil',
                'message' => 'percobaan login oleh ' . $value
            ],
            [
                // login fail
                'type'    => 'login fail',
                'action'  => 'login gagal',
                'message' => 'akun ' . $value . ' tidak ditemukan'
            ],
            [
                // logout
                'type'    => 'logout',
                'action'  => 'berhasil logout',
                'message' => 'berhasil keluar dari sistem'
            ],
            [
                // validation token
                'type'    => 'validation',
                'action'  => 'validasi token',
                'message' => 'percobaan validasi token user'
            ],
            [
                // refresh token
                'type'    => 'refresh',
                'action'  => 'refresh token',
                'message' => 'percobaan refresh token user'
            ],
            [
                // get all data
                'type'    => 'all data',
                'action'  => 'get all data ' . $value,
                'message' => 'percobaan mengambil semua data ' . $moreValue
            ],
            [
                // get single data
                'type'    => 'single data',
                'action'  => 'get single data ' . $value,
                'message' => 'percobaan mengambil 1 data dengan ' . $moreValue
            ],
            [
                // save data
                'type'    => 'save',
                'action'  => 'save data',
                'message' => 'berhasil menyimpan data ' . $value
            ],
            [
                // update data
                'type'    => 'update',
                'action'  => 'update data ' . $value,
                'message' => 'berhasil mengubah data ' . $value . ' menjadi ' . $moreValue
            ],
            [
                // delete data
                'type'    => 'delete',
                'action'  => 'delete data',
                'message' => 'percobaan menghapus data ' . $value
            ],
            [
                // delete data
                'type'    => 'delete permanent',
                'action'  => 'delete data permanent',
                'message' => 'percobaan menghapus data secara permanen ' . $value
            ],
            [
                // restore data
                'type'    => 'restore',
                'action'  => 'restore data ' . $value,
                'message' => 'percobaan mengembalikan data ' . $value . ' dengan ' . $moreValue
            ],
            [
                // total data
                'type'    => 'total',
                'action'  => 'get total data',
                'message' => 'mengambil total data ' . $value
            ],
            [
                // search data
                'type'    => 'search',
                'action'  => 'search data ' . $value,
                'message' => 'pencarian data ' . $value . ' berdasarkan ' . $moreValue
            ],
            [
                // generate
                'type'    => 'generate',
                'action'  => 'generate data ' . $value,
                'message' => 'generate data ' . $value . ' value ' . $moreValue
            ],
            [
                // export
                'type'    => 'export',
                'action'  => 'export data',
                'message' => 'export data ' . $value
            ],
            [
                // change password
                'type'    => 'change password',
                'action'  => 'change password ',
                'message' => 'percobaan mengganti password oleh user ' . $value
            ],
            [
                // import
                'type'    => 'import',
                'action'  => 'import data',
                'message' => 'import data ' . $value
            ],
        ];

        $filteredArray = array_filter($data, function ($item) use ($key, $type) {
            return $item[$key] === $type;
        });

        $return = [
            'action' => ucwords(array_values($filteredArray)[0]['action']),
            'message' => ucwords(array_values($filteredArray)[0]['message'])
        ];

        return $return;
    }
}
