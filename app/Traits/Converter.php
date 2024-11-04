<?php

namespace App\Traits;

trait Converter{
    public function numberFormat($number){
        return number_format($number, 0, ",", ".");
    }

    public function increasingDate($date, String $time, String $format = "Y-m-d H:i:s"){
        return date($format, strtotime($date.$time));
    }

    public function dateStyleFormat($date){
        return date("d-m-Y", strtotime($date));
    }

    public function timeStyleFormat($date){
        return date("H:i:s", strtotime($date));
    }

    public function timestampFormat($date){
        return date("d-m-Y H:i:s", strtotime($date));
    }

    public function getDay($date = null){
        if(!$date){
            $date = date("Y-m-d");
        }

        $tgl = $this->dateFormat($date, true);
        $e   = explode(",", $tgl);
        return $e[0];
    }

    public function getMonthLabel($month){
        $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        return $bulan[(int)$month];
    }

    public function dateFormat($tanggal, $cetak_hari = false)
    {
        $hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
        $bulan     = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }

        return $tgl_indo;
    }

    public function changeDateStyle1($date, $day = false){
        return $this->dateFormat($this->dateStyleFormat($date), $day)." ".$this->timeStyleFormat($date);
    }

    public function waAbleNumber($nohp){
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(" ","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace("(","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")","",$nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace(".","",$nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if(!preg_match('/[^+0-9]/',trim($nohp))){
            // cek apakah no hp karakter 1-3 adalah +62
            // cek apakah no hp karakter 1 adalah 0
            if(substr(trim($nohp), 0, 3) == '+62' || substr(trim($nohp), 0, 1) == '0'){
                $nohp = '62'.substr(trim($nohp), 1);
            }
        }

        return $nohp;
    }

    public function dateTimeDiff($date1, $date2, $onlyDiff = true){
        $start = new \DateTime($date1);
        $diff  = $start->diff(new \DateTime($date2));
        if(!$onlyDiff){
            $msg = "";

            if($diff->y > 0){
                $msg .= $diff->y." tahun ";
            }

            if($diff->m > 0){
                $msg .= $diff->m." bulan ";
            }

            if($diff->d > 0){
                $msg .= $diff->d." hari ";
            }

            if($diff->h > 0){
                $msg .= $diff->h." jam ";
            }

            if($diff->i > 0){
                $msg .= $diff->i." menit ";
            }

            if($diff->s > 0){
                $msg .= $diff->s." detik";
            }

            return $msg;
        }

        return $diff;
    }

    public function getTotalHourBetweenTwoDates($date1, $date2){
        $diff = $this->dateTimeDiff($date1, $date2);

        $hour = $diff->h;
        $hour = $hour + ($diff->days * 24);

        return $hour;
    }

    public function getLoopDate($date1, $date2){
        $begin = new \DateTime( $date1 );
        $end = new \DateTime( $date2 );
        $end = $end->modify( '+1 day' );

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval ,$end);

        return $daterange;
    }
}
