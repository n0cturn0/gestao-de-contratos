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
                               <label>Selecione  Um cliente</label>
                            </span>
                            <div class="form-group">
                                <select  class="custom-select" wire:model="idcontrato">
                                    <option label="Selecione uma opção"></option>
                                    @foreach($clients as $values)
                                        <option value="{{$values->id}}"> Contrato: {{ $values->produto }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{$idcontrato}}

                        <div class="col-md-6">
                            <span>
                               <label>Selecione  Um cliente</label>
                            </span>
                            <div class="form-group">
                                <input type="text"   wire:model="contato">
{{--                                <select  class="custom-select" wire:model="idcontrato">--}}
{{--                                    @foreach($items as $values)--}}
{{--                                        <option value="{{$values->id}}"> Contrato: {{ $values->idcontrato }}  - {{$values->cliente}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                        </div>



                        <div class="card-body">

                            <div style="margin-top: 5px">

                            </div>
                        </div>

                        <div class="card-footer">
{{--                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Adicionar</button>--}}
{{--                            <div wire:loading>--}}
{{--                                Procurando . . .--}}
{{--                            </div>--}}
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
