@extends('adminlte::page')


@section('title', 'Cadastro de novo Serviço')

@section('content_header')


@stop

@section('content')
    @livewire('servico.index')
@stop

@section('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#studentModal').modal('hide');
            $('#updateStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        })
    </script>
@endsection


