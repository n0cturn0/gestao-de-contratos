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
                        <div class="col-md-6">
                            <span>
                               <label>Selecione  o status do contrato</label>
                            </span>
                            <div class="form-group">
                                <select name="identificador" class="custom-select"name="" id="" wire:model="type">
                                    <option value="0">Ativo</option>
                                    <option value="1">Inativo</option>
                                    <option value="2">Renovado</option>
                                    <option value="3">Reincidido</option>
                                </select>
                            </div>





                        </div>

                        <div class="card-body">
                            <table class="table table-borderd table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Produto</th>
                                    <th>Data de criação</th>
                                    <th>Contrato</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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
                                        <td>{{ date('d-m-Y', strtotime($student->created_at)); }}</td>
                                        <td>
                                            @if($student->situacao == 0)

                                            <span style="align-items: center" class="float-center badge bg-success">ativo</span></td>
                                        @endif

                                        @if($student->situacao == 1 )

                                            <span style="align-items: center" class="float-center badge bg-secondary">Inativo</span></td>
                                        @endif

                                        @if($student->situacao == 2 )

                                            <span style="align-items: center" class="float-center badge bg-primary">Renovado</span></td>
                                        @endif
                                        @if($student->situacao == 3 )

                                            <span style="align-items: center" class="float-center badge bg-danger">Reincidido</span></td>
                                        @endif
                                        <td>

                                            <a href="{{url('situacao-contrato/'.$student->id)}}" class="btn btn-block btn-primary btn-sm"><i class="fa fa-sign-in-alt"> Status </i> </a>


                                        </td>

                                        <td> <a href="{{url('configura-contrato/'.$student->id)}}" class="btn btn-block btn-danger btn-sm"><i class="fa fa-check-double"> Config</i></a></td>
                                        <td>

                                            <a href="{{url('insere-servico/'.$student->id)}}" class="btn btn-block btn-success btn-sm"><i class="fa fa-bolt">Lançamentos</i></a>




                                        </td>
                                        <td>
                                            <a href="{{url('insere-servico/'.$student->id)}}" class="btn btn-block btn-info btn-sm"><i class="fa fa-rocket" aria-hidden="true">Comissão</i></a>
                                        </td>
                                        <td><a href="{{url('relatorio-contrato/'.$student->id)}}"><img src="{{asset('img/pdf.png')}}" width="32" height="32"></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div style="margin-top: 5px">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
