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
                    
                    <form method="post" action="{{ route('alternatif.store') }}">
                        @csrf
                        <div class="form-group">    
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" name="description"/>
                        </div>
                        
                        @foreach($kriteria as $k)
                        <div class="form-group">
                            <label for="{{$k->id}}">{{$k->name}} ({{$k->type}}):</label>
                            <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]1" value="1">
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]2" value="2">
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]3" value="3">
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]4" value="4">
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]4">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bobot[{{$k->id}}][bobot]" id="bobot[{{$k->id}}][bobot]5" value="5">
                                        <label class="form-check-label" for="bobot[{{$k->id}}][bobot]5">5</label>
                                    </div>
                                    </div>
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