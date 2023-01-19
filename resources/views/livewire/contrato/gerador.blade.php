<div>

    @include('livewire.grupomodal')

    <div class="container" >
        <div class="row">
            <div class="col-md-12" style="margin-top: 10px">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <h4>
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Buscar grupo" style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">
                                Adicionar novo Grupo
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Grupo</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->grupo }}</td>

                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateStudentModal" wire:click="editStudent({{$student->id}})" class="btn btn-primary">
                                            Edit
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteStudentModal" wire:click="deleteStudent({{$student->id}})" class="btn btn-danger">Delete</button>
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
                </div>
            </div>
        </div>
    </div>

</div>
