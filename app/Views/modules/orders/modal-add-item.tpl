<div id="modal-add-item" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Filtros</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-6">
                            <label for="input-search">Busca</label>
                            <div class="input-group input-group-sm">
                                <input id="input-search-modal" type="text" name="table_search" class="form-control" placeholder="Filtrar por {{$ref.single}}">

                                <div class="input-group-append">
                                    <button id="btn-search-modal"  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                        <div class="card-body list-container">

                        </div>
                        <div class="card-footer pagination-container">
                            {{$pagination}}
                        </div>
                    </div> <!--CARD -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ok</button>
            </div>
        </div>
    </div>
</div>