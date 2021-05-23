{{include file="elements/header.tpl"}}
{{include file="elements/sidebar.tpl"}}

<div class="content-wrapper"> <!--content-wrapper -->
    {{include file="elements/content-header.tpl"}}

    <div class="container-fluid"> <!-- container-fluid -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Filtros</h3>
            </div>
            <div class="card-body">
                <div class="form-group col-6">
                    <label for="mdl-list-input-search">Busca</label>
                    <div class="input-group input-group-sm">
                        <input id="mdl-list-input-search" type="text" name="table_search" class="form-control" placeholder="Filtrar por {{$ref.single}}">

                        <div class="input-group-append">
                            <button id="mdl-list-btn-search"  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--CARD -->

        <form id="main-form" action="{{site_url($pathMod)}}/submit" method="POST">
            <input type="hidden" name="id" value="{{$data.id}}">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Listagem de {{$ref.plural}} (<span class="total-results" id="mdl-list-total-results">{{$total_results}}</span>)</h3>
                    <div class="card-tools">

                        <div class="">
                            <a class="btn btn-default" href="{{site_url($pathMod)}}/form">
                                <i class="fas fa-plus mr-2 text-success"></i>
                                Novo
                            </a>
                            <button disabled type="submit" class="btn btn-default" name="action" value="form" id="btn-edit">
                                <i class="fas fa-save mr-2 text-info"></i>
                                Editar
                            </button>
                            <button disabled type="submit" class="btn btn-default open-modal-delete" name="action" value="delete" id="btn-delete">
                                <i class="fas fa-trash mr-2 text-danger"></i>
                                Deletar
                            </button>
                        </div>

                    </div>
                </div>
                <div class="card-body list-container" id="mdl-list-list-container">
                    <!-- Renderização da tabela -->
                    {{include file="modules/{{$pathMod}}/table.tpl"}}
                </div>
                <div class="card-footer pagination-container" id="mdl-list-pagination-container">
                    {{$pagination}}
                </div>
            </div> <!--CARD -->
        </form>

    </div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->

{{include file="elements/footer.tpl"}}
