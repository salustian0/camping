{{include file="elements/header.tpl"}}
{{include file="elements/sidebar.tpl"}}

<div class="content-wrapper" style="padding: 30px">
  {{include file="elements/content-header.tpl"}}
<div class="container-fluid">


<!-- form -->
<form action="{{site_url($pathMod)}}/submit" method="POST">
<input type="hidden" name="id" value="{{$data.id}}">
<div class="card">
  <div class="card-header">
  <i class="fas fa-tag mr-2"></i>
  <h3 class="card-title mr-2">Listagem de {{$ref.plural}}</h3>
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
  <div class="card card-primary" style="box-shadow: none">

  <div class="card-body">
  
  <div class="row">
  <div class="col-8">
    <div class="form-group col-6">
      <label for="name">Nome completo</label>
      <input name="name" type="text" id="name" class="form-control" value="{{$data.name}}">
    </div>
    <div class="form-group col-6">
      <label for="email">Email</label>
      <input name="email" type="email" id="email" class="form-control" value="{{$data.email}}">
    </div>

      <div class="form-group col-6">
        <label for="password">Senha</label>
        <input name="password" type="password" id="password" class="form-control">
      </div>
      <div class="form-group col-6">
        <label for="cpassword">Confirmar senha</label>
        <input name="cpassword" type="password" id="cpassword" class="form-control">
      </div>
    </div>
    <div class="col-12 col-sm-4">
    {{if $list_modules && count($list_modules)}}
      {{foreach item=v from=$list_modules}}
        <div class="form-group">
          <input type="checkbox" class="control-input" name="access[]" value="{{$v.id}}" {{$v.checked}} >
          <i class="nav-icon fa {{$v.icon}}"></i>
          <label class="control-label" for="">
            {{$v.title}}
          </label>

          {{if $v.childs && count($v.childs)}}
            {{foreach item=c from=$v.childs}}
              <div class="form-group" style="margin-left:30px">
                <input type="checkbox" class="control-input" name="access[]" value="{{$c.id}}" {{$c.checked}} >
                <i class="nav-icon fa {{$c.icon}}"></i>
                <label class="control-label" for="">
                  {{$c.title}}
                </label>
              </div>
            {{/foreach}}
          {{/if}} 
        </div>
      {{/foreach}}
    {{/if}}
  </div>
   
</div>
    
  </div>
  <!-- /.card-body -->
</div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
</form>
<!--form -->




</div> <!-- container-fluid -->
</div> <!-- conent-wrapper -->

{{include file="elements/footer.tpl"}}