@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang !') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Sistem Penunjang Keputusan (SPK) Dengan Metode Simple Additive Weighting (SAW) Sebagai Penunjang Dalam Menentukan Strategi Pembelajaran
                    <br>
                    <br>
                    Sistem pendukung keputusan adalah sistem yang digunakan untuk dapat mengambil keputusan pada situasi semi terstruktur dan tidak terstruktur, dimana seseorang tidak mengetahui secara pasti bagaimana seharusnya sebuah keputusan dibuat.

                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Cara Penggunaan') }}</div>

                <div class="card-body">
                    <ol>
                        <li>(Dapat dilewati dan menggunakan data default) <b>Mengisi Data Kriteria</b> : digunakan sebagai dasar penilaian atau penetapan dalam menentukan Strageti Pembelajaran </li>
                        <li>(Dapat dilewati dan menggunakan data default) <b>Mengisi Data Alternatif</b> : daftar Strageti Pembelajaran yang akan digunakan</li>
                        <li><b>Mengisi Data Siswa</b> : daftar siswa beserta nilai bobot dari setiap kriteria </li>
                        <li><b>Hasil Perhitungan</b> : Melihat hasil rekomendasi strategi pembelajaran pada setiap anak dengan metode Simple Additive Weighting </li>
                    </ol>
                </div>
            </div>
        </div>
        
        
        

    </div>
</div>
@endsection
