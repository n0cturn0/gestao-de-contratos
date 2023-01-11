<div>
    <div>



        <div class="container" >
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px">
                    @if (session()->has('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif

                    <div class="card" style="margin-top: 25px;">
                        <div class="card-header">
                            <h4>
{{--                                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Buscar cliente" style="width: 230px" />--}}
{{--                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">--}}
{{--                                    Adicionar novo Vendedor--}}
{{--                                </button>--}}
                            </h4>
                        </div>
                        <form wire:submit.prevent="saveContrato">
                        <div class="card-body">
                            <table class="table table-borderd table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Produto</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($students as $student)

                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->cliente }}</td>
                                        <td>{{ $student->produto }}</td>
                                        <td>
                                            @if($student->situacao == 0 )

                                            <span style="align-items: center" class="float-center badge bg-success">ativo</span></td>
                                        @endif

                                        @if($student->situacao == 1 )

                                            <span style="align-items: center" class="float-center badge bg-secondary">ativo</span></td>
                                        @endif

                                        @if($student->situacao == 2 )

                                            <span style="align-items: center" class="float-center badge bg-primary">ativo</span></td>
                                        @endif
                                        @if($student->situacao == 3 )

                                            <span style="align-items: center" class="float-center badge bg-danger">ativo</span></td>
                                        @endif
                                        <td>
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Alterar Status</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
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
