@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hasil Perhitungan SAW') }}
                    @if (Request::get('detail') != 1)
                        <a class="btn btn-primary position-absolute" href="?detail=1" style="top: 5px;right: 5px;">Detail</a>
                    @else
                        <a class="btn btn-primary position-absolute" href="?detail=0" style="top: 5px;right: 5px;">Simple</a>
                    @endif
                </div>
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
                                <td>{{$b->name}}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start"><b>{{$s->name}}</b></td>
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
                            @if (Request::get('detail') == 1)
                            <!-- Alternatif -->
                            <tr style=" background: #f7f7f7; ">
                                <td>Alternatif</td>
                                @foreach($s->bobot as $b)
                                <td>{{$b->name}}</td>
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
                            @endif
                            <!-- Ranking -->
                            <tr style=" background: #f7f7f7; ">
                                <td style="text-align: center;" colspan="{{Helper::colspan()}}">Recomendasi</td>
                            </tr>
                            @foreach(Helper::rankTransform($s->bobot,$alternatif) as $row)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                @if ($loop->first)
                                @foreach($row as $col)
                                    @if ($loop->first)
                                    <td colspan="{{Helper::colspan()-2}}"><b>{{$col}}</b></td>
                                    @else
                                    <td>{{$col}}</td>
                                    @endif
                                @endforeach
                                @else
                                @foreach($row as $col)
                                <td colspan="{{Helper::colspan()-2}}">{{$col}}</td>
                                @endforeach
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span>*Rekomendasi ditandai dengan huruf tebal</span>
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
