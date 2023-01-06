@extends('adminlte::page')


@section('title', 'Cadastro de novo Produto')

@section('content_header')


@stop

@section('content')
    @livewire('vendedor.index')
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


