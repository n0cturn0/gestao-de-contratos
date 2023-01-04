<?php ?>
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
          
            <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Buscar Produto...">
        </div>

    </div>
    
    <div>
      
    <table class="table">
        <thead>
            <tr>
                <th wire:click="sortBy('produto')" style="cursor: pointer;">
                    Name

                    @include('partials._sort-icon',['field'=>'produto'])

                </th>
              
                <th></th>
            </tr>
        </thead>

        <tbody>
           

            @foreach ($items as $item)

            <tr>
                <td>{{$item->produto}}</td>
              
                <td>
                  <a class="btn btn-sm btn-primary" href="{{route('event.view', ['event' =>$item->id])}}">Editar</a>
                   {{-- <button wire.click.prevent="EditProduto" class="btn btn-sm btn-primary" >Editar</button>  --}}
                    {{-- <button type="button" class="btn btn-sm btn-danger" wire:click="confirmDelete({{$item['id']}})">Apagar</button> --}}
                </td>
            </tr>

            @endforeach

            

        

        </tbody>
    </table>
</div>
    <div>

        
        <p>
              {{$items->links()}} 
          
        </p>
    </div>









  
</div>


    



