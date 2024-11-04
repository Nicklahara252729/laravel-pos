<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

trait Generator{
    public function numberRandom(){
        return "KODE-".Str::upper(Str::limit(Uuid::uuid4()->getHex(), 10, ''));
    }

    public function generateNewNumber(){
        $lastNumber = DB::table()
                        ->select()
                        ->orderByDesc("id")
                        ->first();
        $noSebelumnya = explode('-',$lastNumber->number);
        $noBerikutnya = $noSebelumnya[1];
        $noBerikutnya++;
        return "KODE-0".sprintf("%04s", $noBerikutnya);
    }
}
