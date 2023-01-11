@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')

    <div>
        <div>



            <div class="container" >
                <div class="row">
                    <div class="col-md-12" style="margin-top: 10px">


                        <div class="card" style="margin-top: 25px;">
                            <div class="card-header">
                                <h4>
                                    {{--                                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Buscar cliente" style="width: 230px" />--}}
                                    {{--                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">--}}
                                    {{--                                    Adicionar novo Vendedor--}}
                                    {{--                                </button>--}}
                                </h4>
                            </div>


                            <div class="card-body">
                                    <form action="/atualizastatuscontrato" method="POST">@csrf
                                    <table class="table table-borderd table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Produto</th>
                                            <th>Selecione</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($students as $student)
                                <input type="hidden" name="id" value="{{$student->id}}">
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->cliente }}</td>
                                                <td>{{ $student->produto }}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="identificador" class="custom-select">
                                                            <option value="0">Ativo</option>
                                                            <option value="1">Inativo</option>
                                                            <option value="2">Renovado</option>
                                                            <option value="3">Reincidido</option>
                                                        </select>
                                                    </div>
                                                <td>
                                                    <input type="submit" class="btn btn-block btn-primary btn-sm" >

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Record Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    </form>
                                    <div style="margin-top: 5px">
                                        {{ $students->links() }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@stop


















