<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelete">Tem certeza que deseja excluir?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Para confirmar a exclusão do(s) item(ns) selecionados digite EXCLUIR, no campo abaixo.</p>

        <input type="text" class="form-control" id="deleteInput" autofocus>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btn-action-delete" class="btn btn-danger text-white btn-modal-delete" type="submit" name="action" value="delete" disabled="true">
            <i class="fa fa-trash-o"></i> Deletar
        </button>
      </div>
    </div>
  </div>
</div>