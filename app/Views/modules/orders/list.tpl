{{include file="elements/header.tpl"}}
{{include file="elements/sidebar.tpl"}}

<div class="content-wrapper"> <!--content-wrapper -->
{{include file="elements/content-header.tpl"}}
{{include file="modules/{{$pathMod}}/modal-add-item.tpl"}}


<div class="container-fluid"> <!-- container-fluid -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Filtros</h3>
        </div>
        <div class="card-body">
                <div class="form-group col-6">
                    <label for="input-search">Busca</label>
                    <div class="input-group input-group-sm">
                        <input id="input-search" type="text" name="table_search" class="form-control" placeholder="Filtrar por {{$ref.single}}">

                        <div class="input-group-append">
                            <button id="btn-search"  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
        </div>
    </div> <!--CARD -->

    <form id="main-form" action="{{site_url($pathMod)}}/submit" method="POST">
        <input type="hidden" name="id" value="{{$data.id}}">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Listagem de {{$ref.plural}} <span id="total-results">({{$total_results}})</span></h3>
                <div class="card-tools">
                      {{if !$creating_order}}
                    <div class="">
                        <button  type="submit" class="btn btn-default add-item-action"  data-type-item="products">
                            <i class="fas fa-plus mr-2 text-success"></i>
                            Adicionar produtos
                        </button>
                        <button  type="submit" class="btn btn-default add-item-action" data-type-item="users">
                            <i class="fas fa-plus mr-2 text-success"></i>
                            Adicionar clientes
                        </button>
                     </div>
                     {{/if}}

                </div>
            </div>
            <div class="card-body list-container">
                <!-- Renderização da tabela -->
                {{if $listing && count($listing)}}
                {{include file="modules/{{$pathMod}}/table.tpl"}}
                  {{else}}
                  <div class='alert alert-info col-12 text-center'>Nenhum dado para ser mostrado.</div>
                {{/if}}
            </div>
            <div class="card-footer pagination-container">
                {{$pagination}}
            </div>
        </div> <!--CARD -->
    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->

{{include file="elements/footer.tpl"}}
