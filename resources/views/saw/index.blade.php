@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('SAW') }}</div>
                
                <div class="card-body" style="margin: auto;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @foreach($siswa as $s)
                    <h1>{{$s->name}}</h1>
                    <table class="table"  style="text-align: center;">
                        <thead>
                            <tr style=" background: #f7f7f7; ">
                                <td>Nama</td>
                                @foreach($s->bobot as $b)
                                <td>{{$b->name}}  ({{$b->type}})</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>{{$s->name}}</b></td>
                                @foreach($s->bobot as $b)
                                <td>{{$b->pivot->bobot}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Bobot</td>
                                @foreach(Helper::bobotTransform($s->bobot) as $bt)
                                <td>{{$bt}}</td>
                                @endforeach
                            </tr>
                            <!-- Alternatif -->
                            <tr style=" background: #f7f7f7; ">
                                <td>Alternatif</td>
                                @foreach($s->bobot as $b)
                                <td>{{$b->name}}  ({{$b->type}})</td>
                                @endforeach
                            </tr>
                            @foreach($alternatif as $a)
                            <tr>
                                <td>{{$a->name}}</td>
                                @foreach($a->bobot as $ab)
                                <td>{{$ab->pivot->bobot}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <!-- Min/Max -->
                            <tr style=" background: #d2d2d2; ">
                                <td>Min/Max</td>
                                @foreach(Helper::minmaxTransform($alternatif) as $mmt)
                                <td>{{$mmt}}</td>
                                @endforeach
                            </tr>
                            <!-- Normalisasi -->
                            <tr style=" background: #f7f7f7; ">
                                <td style="text-align: center;" colspan="{{Helper::colspan()}}">Normalisasi</td>
                            </tr>
                            @foreach(Helper::normalisasiTransform($alternatif) as $row)
                            <tr>
                                @foreach($row as $col)
                                <td>{{$col}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <!-- Hasil -->
                            <tr style=" background: #f7f7f7; ">
                                <td style="text-align: center;" colspan="{{Helper::colspan()}}">Hasil</td>
                            </tr>
                            @foreach(Helper::hasilTransform($s->bobot,$alternatif) as $row)
                            <tr>
                                @foreach($row as $col)
                                <td>{{$col}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <!-- Ranking -->
                            <tr style=" background: #f7f7f7; ">
                                <td style="text-align: center;" colspan="{{Helper::colspan()}}">Recomendasi</td>
                            </tr>
                            @foreach(Helper::rankTransform($s->bobot,$alternatif) as $row)
                            <tr>
                                @foreach($row as $col)
                                <td>{{$col}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
