<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

{{--        <table class="table table-bordered">--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>Name</th>--}}
{{--                <th>Phone</th>--}}
{{--            </tr>--}}
{{--            @foreach($contacts as $key => $value)--}}
{{--                <tr>--}}
{{--                    <td>{{ $value->id }}</td>--}}
{{--                    <td>{{ $value->valorunitario }}</td>--}}
{{--                    <td>{{ $value->valortotal }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}

        <form>
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-5">
                    <select>
                        @foreach($situacao as $item)
                            <option value="{{$item->id}}">{{$item->cliente}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-md-5">
                        <select wire:model="servicoid.0" >
                            <option value="">--------</option>
                            @foreach($servico as $item)
                                <option value="{{$item->id}}">{{$item->servico}}        R$:{{$item->precounitario}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <button type="button" wire:click.prevent="identificacao()"      class="btn btn-success btn-sm" wire:loading.attr="disabled" >Adicionar </button>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Name" wire:model="valorunitario.0">
                            @error('valorunitario.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="phone" class="form-control" wire:model="valortotal.0" placeholder="Enter Phone">
                            @error('valortotal.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                    </div>
                </div>
            </div>

            @foreach($inputs as $key => $value)
                <div class=" add-input">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Enter Name" wire:model="inputservico.0">
                                @error('valorunitario.0') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Name" wire:model="valorunitario.{{ $value }}">
                                @error('valorunitario.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" wire:model="valortotal.{{ $value }}" placeholder="Enter phone">
                                @error('valortotal.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-12">
                    <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
