{{include file="elements/header.tpl"}}
<main class="main">

  <!-- Breadcrumb-->
  <ol class="breadcrumb">
  Configuração / Log de Acessos
  </ol>
  <div class="container-fluid">
      <div class="animated fadeIn">
        

      <form method="POST">
        <div class="card">
          <div class="card-header card-header-f"><i class="fa fa-edit"></i> Registros
            <div class="card-header-actions">
              <button class="btn btn-info text-white" type="submit" name="action" value="exportar">
                  <i class="fa fa-download"></i> Exportar CSV
              </button>
            </div>
          </div>
          <div class="card-body">
            {{if $error && count($error)}}
              <div class="alert alert-{{$error.error_type}} text-center">{{$error.error_string}}</div>
            {{/if}}
            
            {{if $listing && count($listing)}}
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="color:#000" >Nome</th>
                    <th style="color:#000" class="text-center">IP</th>
                    <th style="color:#000" class="text-center">Data do Acesso</th>
                  </tr>
                </thead>
                <tbody>
                  {{foreach item=v from=$listing}}
                    <tr>
                      <td>{{$v.name}}
                        <br/>
                        <small>{{$v.email}}</small>
                      </td>
                      <td class="text-center align-middle">
                        {{$v.ip}}
                      </td>
                      
                      <td class="align-middle text-center">
                        {{$v.dtRegister}}
                        {{if $v.lastLogin}}
                          <small> Último Acesso: {{$v.lastLogin}}</small>
                        {{/if}}
                      </td>
                    </tr>
                  {{/foreach}}
                </tbody>
              </table>
            {{/if}}
          </div>
        </div>
        {{$set_pagination}}
      
      </div>
    </div>

    {{include file="elements/modal-delete.tpl"}}
    </form>
</main>
{{include file="elements/footer.tpl"}}
