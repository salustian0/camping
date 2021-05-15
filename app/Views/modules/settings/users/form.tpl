{{include file="elements/header.tpl"}}
{{include file="elements/sidebar.tpl"}}

<div class="content-wrapper" style="padding: 30px"> <!--content-wrapper -->
{{include file="elements/content-header.tpl" module_part="form"}}

<div class="container-fluid"> <!-- container-fluid -->
    <form action="{{site_url($pathMod)}}/submit" method="POST">
        <input type="hidden" name="id" value="{{$data.id}}">

        <div class="card">
            <div class="card-header">
                {{if $data.id}}<i class="float-left fas fa-edit mr-2"></i>{{else}}<i class="float-left fas fa-address-book fa-lg mr-2"></i>{{/if}}
                <h3 class="card-title mr-2">{{if $data.id}}Edição{{else}}Registro{{/if}} de {{$ref.plural}}</h3>
                <div class="float-right">
                    <a class="btn btn-info mr-2" href="{{site_url($pathMod)}}">
                      <i class="fas fa-undo mr-2"></i>
                      Voltar
                    </a>
                    <button type="submit" class="btn btn-success" name="action" value="save">
                    <i class="fas fa-save mr-2"></i>
                      Salvar
                    </button>
                 </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="form-group col-6">
                    <label for="name">Nome completo</label>
                    <input name="name" type="text" id="name" class="form-control" value="{{$data.name}}">
                  </div>
                  <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email" class="form-control" value="{{$data.email}}">
                  </div>

                  <div class="form-group col-8">
                  <label for="email">Endereço</label>
                  <input name="email" type="email" id="email" class="form-control" value="{{$data.address}}">
                  </div>

                  <div class="form-group col-4">
                    <label for="number">Número</label>
                    <input name="number" type="number" id="number" class="form-control" value="{{$data.number}}">
                  </div>

                  <div class="form-group col-8">
                    <label for="neightborhood">Bairro</label>
                    <input name="number" type="neightborhood" id="neightborhood" class="form-control" value="{{$data.neightborhood}}">
                  </div>

                  <div class="form-group col-4">
                    <label for="zipcode">Cep</label>
                    <input name="zipcode" type="text" id="zipcode" class="form-control" value="{{$data.zipcode}}">
                  </div>
                </div>
            </div>
        </div> <!--CARD -->

        <div class="card table-add-container">
            <div class="card-header">
                <i class="float-left fas fa-address-book fa-lg mr-2"></i>
                <h3 class="card-title mr-2">Registro de acompanhantes</h3>
            </div>
            <div class="card-body">
                <div class="row">
                     <div class="form-group col-6">
                       <label for="companions">Nome</label>
                       <input id="input-name" type="text" class="form-control" name="companions-name" value="">
                     </div>
                      <div class="form-group col-4">
                       <label for="type">Tipo</label>
                       {{$slc_type}}
                     </div>
                     <div class="d-flex justify-content-center align-items-center pt-3">
                        <button class="btn btn-default table-action-add" data-table-target-id="#table-companions">
                            <i class="fas fa-plus mr-2 text-success"></i>
                            <span>Adicionar</span>
                        </button>
                    </div>
                    <table class="table" id="table-companions">
                        <thead>
                            <tr>
                                <th data-input-name="name" data-input-origin="#input-name">Nome</th>
                                <th data-input-name="type" data-input-origin="#input-type">Tipo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{if $companions && count($companions)}}
                                {{foreach item=$c from=$companions key=$k}}
                                  <tr id="{{md5($k)}}">
                                    <td class="name">
                                        <span>{{$c.name}}</span>
                                        <input {{if $data.id}}disabled{{/if}} type='hidden' name='companions[name][]' class='companions-name' value='{{$c.name}}'/>
                                    </td>
                                   <td class="type">
                                        <span>{{$types[$c.type]}}</span>
                                        <input {{if $data.id}}disabled{{/if}} type='hidden' name='companions[type][]' class='companions-name' value='{{$c.type}}'/>
                                    </td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                        <a {{if $data.id}}data-database-id="{{$c.id}}"{{/if}} data-id="{{md5($k)}}" href="#" class="btn btn-info edit-companions"><i class="fas fa-edit"></i></a>
                                        <a {{if $data.id}}data-database-id="{{$c.id}}"{{/if}} data-id="{{md5($k)}}" href="#" class="btn btn-danger delete-companions open-modal-delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                  </tr>
                                {{/foreach}}
                            {{/if}}
                        </tbody>
                    </table>
                 </div>
            </div>
        </div> <!-- CARD -->
    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->
<script class="text-javascript">
    const types = JSON.parse('{{json_encode($types,true)}}');
</script>

{{include file="elements/footer.tpl"}}