@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alternatif') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <form method="post" action="{{ route('alternatif.update', $alternatif->id) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $alternatif->name }}"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" name="description" value="{{ $alternatif->description }}"/>
                        </div>
                        @foreach($kriteria as $k)
                        <div class="form-group">
                            <label for="{{$k->id}}">{{$k->name}} ({{$k->type}}):</label>
                            @if (array_search($k->id,array_column($alternatif->bobot->toArray(),'id')) !== null)
                                @if (isset($alternatif->bobot[(int)array_search($k->id,array_column($alternatif->bobot->toArray(),'id'))]->pivot->bobot))
                                    <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]1" value="1" {{($alternatif->bobot[(int)array_search($k->id,array_column($alternatif->bobot->toArray(),'id'))]->pivot->bobot) == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]2" value="2" {{($alternatif->bobot[(int)array_search($k->id,array_column($alternatif->bobot->toArray(),'id'))]->pivot->bobot) == 2 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]3" value="3" {{($alternatif->bobot[(int)array_search($k->id,array_column($alternatif->bobot->toArray(),'id'))]->pivot->bobot) == 3 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]4" value="4" {{($alternatif->bobot[(int)array_search($k->id,array_column($alternatif->bobot->toArray(),'id'))]->pivot->bobot) == 4 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]4">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]5" value="5" {{($alternatif->bobot[(int)array_search($k->id,array_column($alternatif->bobot->toArray(),'id'))]->pivot->bobot) == 5 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]5">5</label>
                                    </div>
                                    </div>
                                    
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