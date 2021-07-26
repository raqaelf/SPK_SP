@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <form method="post" action="{{ route('siswa.update', $siswa->id) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $siswa->name }}"/>
                        </div>
                        
                        @foreach($kriteria as $k)
                        <div class="form-group">
                            <label for="{{$k->id}}">{{$k->name}}:</label>
                            @if (array_search($k->id,array_column($siswa->bobot->toArray(),'id')) !== null)
                                @if (isset($siswa->bobot[(int)array_search($k->id,array_column($siswa->bobot->toArray(),'id'))]->pivot->bobot))
                                    <input type="number" class="form-control" name="bobot[{{$k->id}}][bobot]" value="{{$siswa->bobot[(int)array_search($k->id,array_column($siswa->bobot->toArray(),'id'))]->pivot->bobot}}"/>
                                @else
                                    <input type="number" class="form-control" name="bobot[{{$k->id}}][bobot]"/>
                                @endif
                            @else
                                <input type="number" class="form-control" name="bobot[{{$k->id}}][bobot]"/>
                            @endif
                        </div>
                        @endforeach

                        <input type="submit" class="btn btn-primary"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection