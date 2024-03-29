<!-- Insert Modal -->

<div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Cadastrar novo cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveStudent">
                <div class="modal-body">
                    <div class="form-group">
                        @error('id') <span class="text-danger">{{ $message }}</span> @enderror
                        <label>Custom Select</label>
                        <select wire:model="identificador" class="custom-select">
                            <option value="1">option 1</option>
                            <option value="2">option 2</option>
                            <option value="3">option 3</option>
                            <option value="4">option 4</option>
                            <option value="5">option 5</option>
                        </select>
                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Cliente</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Student Modal -->
<div wire:ignore.self class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="updateStudentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStudentModalLabel">Atualizando informações do vendedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateStudent">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            @error('id') <span class="text-danger">{{ $message }}</span> @enderror
                            <label>Custom Select</label>
                            <select wire:model="identificador" class="custom-select">
                                <option value="1">option 1</option>
                                <option value="2">option 2</option>
                                <option value="3">option 3</option>
                                <option value="4">option 4</option>
                                <option value="5">option 5</option>
                            </select>
                        </div>

{{--                        <div class="mb-3">--}}
{{--                            <label>Telefone</label>--}}
{{--                            <input type="text" wire:model="fone"  class="form-control input-sm">--}}
{{--                            @error('fone') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">Apagar Vendedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyStudent">
                <div class="modal-body">
                    <h4>Deseja excluir este Vendedor ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Sim! Apagar</button>
                </div>
            </form>
        </div>
    </div>
</div>
