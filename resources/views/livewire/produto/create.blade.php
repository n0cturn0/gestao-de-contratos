<div>
    <section class="content" style="margin-top: 20px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$message}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form wire:submit.prevent="save">
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
                                <span class="text-success">  {{ session('success_message') }}</span>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome do produto</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entre com nome do produto" required wire:model="produto" class="@error('produto') is-invalid @enderror">
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>





                        </form>
                    </div>
                    <!-- /.card -->



                </div>
            </div>
        </div>
    </section>
</div>
