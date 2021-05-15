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
                    <input placeholder="Barraca azul ..." name="name" type="text" id="name" class="form-control" value="{{$data.name}}">
                  </div>

                  <div class="form-group col-6">
                    <label for="price">Preço</label>
                    <input placeholder="R$:0,00" name="price" type="number" id="price" class="form-control" value="{{$data.price}}">
                  </div>

                  <div class="form-group col-4">
                    <label for="category">Categorias</label>
                    {{$slc_category}}
                  </div>

                  <div class="form-group col-4">
                    <label for="active">Status</label>
                    {{$slc_status}}
                  </div>

                  <div class="form-group col-4">
                    <label for="stock">Quantidade em estoque</label>
                    <input placeholder="Ex: 45" name="stock" type="number" id="stock" class="form-control" value="{{$data.stock}}">
                  </div>

                  <div class="form-group col-12">
                    <label for="description">Descrição</label>
                    <textarea name="description" placeholder="ex: Barraca de..." class="form-control" id="description" style="resize:none;height:300px">{{$data.description}}</textarea>
                  </div>


                </div>
            </div>
        </div> <!--CARD -->
    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->
<script class="text-javascript">
    const types = JSON.parse('{{json_encode($types,true)}}');
</script>

{{include file="elements/footer.tpl"}}