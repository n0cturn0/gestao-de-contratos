@extends('adminlte::page')


@section('title', 'Cadastro de novo Cliente')

@section('content_header')


@stop

@section('content')
    @livewire('grupo.index')
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



