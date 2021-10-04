<?php
use App\Models\Kriteria;

class Helper 
{
    public static function applyClass($user) {
        return "call from helper to " . $user;
    }
    public static function bobotTransform($data)
    {
        $listBobot = array();
        foreach ($data as $d){ 
            array_push($listBobot, $d->pivot->bobot);
        }
        $sum = array_sum($listBobot);
        $listBobotPersen = array();
        foreach ($listBobot as $x){ 
            array_push($listBobotPersen, number_format((float)$x/$sum, 3, '.', ''));
        }
        return $listBobotPersen;
    }
    public static function minmaxTransform($data)
    {
        $count = count($data[0]->bobot);
        $list = array();
        for ($x = 0; $x < $count; $x++) {
            $bobot = null;
            foreach ($data as $d){
                if ($d->bobot[$x]->type == 'cost'){
                    if ($bobot == null){
                        $bobot = $d->bobot[$x]->pivot->bobot;
                    } else if ($bobot > $d->bobot[$x]->pivot->bobot) {
                        $bobot = $d->bobot[$x]->pivot->bobot;
                    }
                } else {
                    if ($bobot == null){
                        $bobot = $d->bobot[$x]->pivot->bobot;
                    } else if ($bobot < $d->bobot[$x]->pivot->bobot) {
                        $bobot = $d->bobot[$x]->pivot->bobot;
                    }
                }
            }
            array_push($list, $bobot);
        }
        return $list;
    }
    public static function colspan(){
        $kriteria = Kriteria::all();
        $count = count($kriteria);
        return $count+1;
    }
    public static function normalisasiTransform($data){
        $getMinMax = self::minmaxTransform($data);
        $count = count($data[0]->bobot);
        $listfull = array();
        foreach ($data as $d){
            $list = array();
            array_push($list, $d->name);
            for ($x = 0; $x < $count; $x++) {
                if ($d->bobot[$x]->type == 'cost'){
                    $normalisasi = $getMinMax[$x] / $d->bobot[$x]->pivot->bobot;
                } else {
                    $normalisasi = $d->bobot[$x]->pivot->bobot / $getMinMax[$x];
                }
                array_push($list, number_format((float)$normalisasi, 3, '.', ''));
            }
            array_push($listfull, $list);
        }
        return $listfull;
    }
    public static function hasilTransform($bobot,$data){
        $getBobot = self::bobotTransform($bobot);
        $getNormalisasi = self::normalisasiTransform($data);
        $listhasilfull = array();
        $count = count($getNormalisasi[0]);
        foreach ($getNormalisasi as $n){
            $listhasil = array();
            for ($x = 0; $x < $count; $x++) {
                if ($x > 0){
                    $hasil = number_format((float)$n[$x]*$getBobot[$x-1], 3, '.', '');
                } else {
                    $hasil = $n[$x];
                }
                array_push($listhasil, $hasil);
            }
            array_push($listhasilfull, $listhasil);
        }
        return $listhasilfull;
    }
    public static function rankTransform($bobot,$data){
        $getHasil = self::hasilTransform($bobot, $data);
        $listrankfull = array();
        $count = count($getHasil[0]);
        foreach ($getHasil as $h){
            $ranklist = array();
            $hasiljumlah = 0;
            for ($x = 0; $x < $count; $x++) {
                if ($x == 0){
                    $name = $h[$x];
                    array_push($ranklist, $name);
                } else {
                    $hasiljumlah += $h[$x];
                }
            }
            array_push($ranklist, $hasiljumlah);
            array_push($listrankfull, $ranklist);
        }
        // $col = array_column( $listrankfull,1);

        // array_multisort( $col, SORT_DESC, $listrankfull );
        // print_r($col);
        array_multisort(
            array_column($listrankfull, 1), SORT_DESC,
            $listrankfull
        );
        return $listrankfull;
    }
}