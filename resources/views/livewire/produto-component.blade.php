<div>

    <div class="row mb-4">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>2</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="col">
          
            <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search Products...">
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th wire:click="sortBy('produto')" style="cursor: pointer;">
                    Name

                    @include('partials._sort-icon',['field'=>'produto'])

                </th>
                <th wire:click="sortBy('description')"  style="cursor: pointer;">
                    Description

                    {{-- @include('partials._sort-icon',['field'=>'description']) --}}
                </th>
                <th wire:click="sortBy('price')" style="cursor: pointer;">
                    Price
                    {{-- @include('partials._sort-icon',['field'=>'price']) --}}
                </th>
                <th></th>
            </tr>
        </thead>

        <tbody>
           

            @foreach ($items as $item)

            <tr>
                <td>{{$item->produto}}</td>
                <td></td>
                <td></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" wire:click="editProduto({{$item}})">Editar</button>
                    <button type="button" class="btn btn-sm btn-danger" wire:click="confirmDelete({{$item['id']}})">Apagar</button>
                </td>
            </tr>

            @endforeach

            

        

        </tbody>
    </table>

    <div>

        
        <p>
              {{$items->links()}} 
          
        </p>
    </div>
  
</div>
