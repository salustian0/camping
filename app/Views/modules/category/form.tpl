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
                    <label for="name">Nome</label>
                    <input placeholder="Ex: Gelo" name="name" type="text" id="name" class="form-control" value="{{$data.name}}">
                  </div>
                  <div class="form-group col-12">
                    <label for="description">Descrição</label>
                    <textarea name="description" placeholder="Ex: Categoria criada para bebidas ..." class="form-control" id="description" style="resize:none;height:300px">{{$data.description}}</textarea>
                  </div>
                </div>
            </div>
        </div> <!--CARD -->
    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->
{{include file="elements/footer.tpl"}}