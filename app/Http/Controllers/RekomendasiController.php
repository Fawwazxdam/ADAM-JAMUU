<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MENAMPILKAN HALAMAN REKOMENDASI
        return view('rekomendasi');
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
        //PROSSES MENAMPILKAN REKOMENDASI JAMU
        $tahunLahir = $request->tahunlahir;
        $keluhan = $request->keluhan;
        $ambil = new penggunaan($tahunLahir, $keluhan);
        $data = [
            'namajamu' => $ambil->namaJamu(),
            'khasiat' => $keluhan,
            'keluhan' => $keluhan,
            'umur' => $ambil->hitungUmur(),
            'saran' => $ambil->cara() . $ambil->saran(),
        ];
        return view('rekomendasi',compact('data'));
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

class jamu{
    public function __construct($tahunLahir, $keluhan) {
        $this->tahunLahir = $tahunLahir;
        $this->keluhan = $keluhan;
    }
    public function namaJamu()
    {
        if ($this->keluhan == 'keseleo' || $this->keluhan == 'kurang nafsu makan') {
            return 'Beras Kencur';
        } else if ($this->keluhan == 'pegal-pegal') {
            return 'Kunyit Asam';
        } else if ($this->keluhan == 'darah tinggi' || $this->keluhan == 'gula darah') {
            return 'Brotowali';
        } else if ($this->keluhan == 'kram perut' || $this->keluhan == 'masuk angin') {
            return 'Temulawak';
        } else {
            return 'Jamu Belum Ditemukan';
        }
        
    }
    public function hitungUmur()
    {
        return date('Y') - $this->tahunLahir;
    }
}
class penggunaan extends jamu{
    public function saran()
    {
        if ($this->hitungUmur() <= 10) {
            return ' 1x';
        } else {
            return ' 2x';
        }
        
    }
    public function cara()
    {
        if ($this->namaJamu() == 'Beras Kencur' && $this->keluhan == 'keseleo') {
            return 'Dioleskan ';
        } else {
            return 'Diminum ';
        }
        
    }
}