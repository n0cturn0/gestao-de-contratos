<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectBorder">Selecione um cliente <code>para iniciar esse contrato</code></label>
                            @foreach($data['cliente'] as cliente)
                            <select class="custom-select form-control-border" id="exampleSelectBorder">
                                <option>{{$cliente->cliente}}</option>

                            </select>
                            @endforeach
                        </div>

                    </div>



                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectBorder">Selecione um produto <code> para iniciar o contrato</code></label>
                            <select class="custom-select form-control-border" id="exampleSelectBorder">
                                <option>Value 1</option>
                                <option>Value 2</option>
                                <option>Value 3</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
