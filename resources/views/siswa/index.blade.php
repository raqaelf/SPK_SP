@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Siswa') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Berisi data siswa beserta bobot dari kriteria yang digunakan 
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Siswa') }}
                <a class="btn btn-primary position-absolute" href="{{route('siswa.create')}}" style="top: 5px;right: 5px;">Create</a>
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
                                <td>ID</td>
                                <td>Name</td>
                                <td class="text-center">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $k)
                            <tr>
                                <td>{{$k->id}}</td>
                                <td>{{$k->name}}</td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.edit',$k->id)}}" class="btn btn-primary">Edit</a>
                                    <form class="d-inline" action="{{ route('siswa.destroy', $k->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
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