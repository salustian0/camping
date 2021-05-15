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
  
    <div class="form-group col-6">
      <label for="name">Nome completo</label>
      <input name="name" type="text" id="name" class="form-control" value="{{$data.name}}">
    </div>
    <!--
    <div class="form-group col-6">
      <label for="email">Email</label>
      <input name="email" type="email" id="email" class="form-control" value="{{$data.email}}">
    </div>
    -->


      <div class="form-group col-6">
          {{$slc_type}}
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