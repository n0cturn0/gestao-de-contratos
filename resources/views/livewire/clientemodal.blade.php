<!-- Insert Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

{{--                    <div class="form-group">--}}
{{--                        <p>Type:</p>--}}
{{--                        <input  name="type" type="radio" id="internal" value="internal" style="vertical-align:middle; cursor: pointer;">--}}
{{--                        <label for="internal">CPF</label><br>--}}
{{--                        <input  name="type" type="radio" id="global" value="global"  style="vertical-align:middle; cursor: pointer;" checked>--}}
{{--                        <label for="global">CNPJ</label>--}}

{{--                    </div>--}}

                    <div class="mb-3">
                        <label>Cliente</label>
                        <input type="text" wire:model="cliente" class="form-control input-sm">
                        @error('cliente') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                        <div class="mb-3">
                            <label>CPF</label>
                            <input type="text" wire:model="cnpj"  class="form-control input-sm">
                            @error('cnpj') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>




                    <div class="col-md-6">
                        <label>Estado</label>
                        <select id="estado" name="estado" wire:model="estado"  class="form-control input-sm">
                            <option value="">-------</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>

                        @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3" style="margin-top:8px">
                        <label>Cidade</label>
                        <input type="text" wire:model="cidade"  class="form-control input-sm">
                        @error('cidade') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Bairro</label>
                        <input type="text" wire:model="bairro"  class="form-control input-sm">
                        @error('bairro') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Rua</label>
                        <input type="text" wire:model="rua"  class="form-control input-sm">
                        @error('rua') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Número</label>
                        <input type="text" wire:model="numero"  class="form-control input-sm">
                        @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateStudentModalLabel">Atualizando produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateStudent">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Cliente</label>
                            <input type="text" wire:model="cliente" class="form-control input-sm">
                            @error('cliente') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Cnpj</label>
                            <input id="cpfcnpj" type="text" wire:model="cnpj"  class="form-control input-sm">
{{--                            @error('cnpj') <span class="text-danger">{{ $message }}</span> @enderror--}}
                        </div>

                        <div class="col-md-6">
                            <label>Estado</label>
                            <select id="estado" name="estado" wire:model="estado"  class="form-control input-sm">
                                <option value="">-------</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                            </select>

                            @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <p>Type:</p>
                            <input  name="type" type="radio" id="internal" value="internal" style="vertical-align:middle; cursor: pointer;">
                            <label for="internal">internal</label><br>
                            <input  name="type" type="radio" id="global" value="global"  style="vertical-align:middle; cursor: pointer;" checked>
                            <label for="global">global</label>

                        </div>


                        <div class="mb-3" style="margin-top:8px">
                            <label>Cidade</label>
                            <input type="text" wire:model="cidade"  class="form-control input-sm">
                            @error('cidade') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Bairro</label>
                            <input type="text" wire:model="bairro"  class="form-control input-sm">
                            @error('bairro') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Rua</label>
                            <input type="text" wire:model="rua"  class="form-control input-sm">
                            @error('rua') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Número</label>
                            <input type="text" wire:model="numero"  class="form-control input-sm">
                            @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

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
                <h5 class="modal-title" id="deleteStudentModalLabel">Apagar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyStudent">
                <div class="modal-body">
                    <h4>Tem certeza que deseja excluir este cliente ?</h4>
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

<script>




</script>
