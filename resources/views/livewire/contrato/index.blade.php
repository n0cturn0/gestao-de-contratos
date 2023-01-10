<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif





                        <form action="cadastrocontrato" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleSelectBorder">Selecione um cliente <code>para iniciar esse contrato</code></label>

                            <select name="cliente" class="custom-select form-control-border" id="exampleSelectBorder">
                                <option value="">--Selecione--</option>
                                @foreach($data['cliente'] as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->cliente}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>



                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectBorder">Selecione um produto <code> para iniciar o contrato</code></label>

                            <select name="produto" class="custom-select form-control-border" id="exampleSelectBorder">
                                <option value="">--Selecione--</option>
                                @foreach($data['produto'] as $prod)
                                <option value="{{$prod->id}}">{{$prod->produto}}</option>
                                @endforeach
                            </select>

                        </div>




                            <!-- textarea -->
                            <div class="form-group">
                                <label>Observação</label>
                                <textarea name="observacao" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Iniciar Contrato</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

</div>
