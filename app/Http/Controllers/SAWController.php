<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Siswa;


class SAWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::with('bobot')->get();
        $siswa = Siswa::with('bobot')->get();
        // return $siswa;
        
        // return $this->getAlternatif($alternatif);
        // echo "<pre>";
        // echo json_encode($siswa, JSON_PRETTY_PRINT);
        // echo "</pre>";
        // 
        return view('saw.index', compact('siswa','alternatif'));
    }

    public function getAlternatif($data){
        $dataMaster = [];
        foreach ($dataMaster as $dm){ 
            array_push($listBobot, $bobot->pivot->bobot);
        }
        echo "<pre>";
        echo json_encode($data, JSON_PRETTY_PRINT);
        echo "</pre>";
    }

    public function bobot($data)
    {
        $listBobot = array();
        foreach ($data->bobot as $bobot){ 
            array_push($listBobot, $bobot->pivot->bobot);
        }
        $sum = array_sum($listBobot);
        $listBobotPersen = array();
        foreach ($listBobot as $x){ 
            array_push($listBobotPersen, $x/$sum);
        }
        return $listBobotPersen;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
