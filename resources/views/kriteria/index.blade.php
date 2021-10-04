@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Kriteria') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Berisi ukuran yang menjadi dasar penilaian atau penetapan dalam menentukan Strageti Pembelajaran 
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Kriteria') }}
                <a class="btn btn-primary position-absolute" href="{{route('kriteria.create')}}" style="top: 5px;right: 5px;">Create</a>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Type</td>
                                <td class="text-center">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kriteria as $k)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$k->name}}</td>
                                <td>{{$k->description}}</td>
                                <td>{{$k->type}}</td>
                                <td class="text-center">
                                    <a href="{{ route('kriteria.edit',$k->id)}}" class="btn btn-primary">Edit</a>
                                    <form class="d-inline" action="{{ route('kriteria.destroy', $k->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection