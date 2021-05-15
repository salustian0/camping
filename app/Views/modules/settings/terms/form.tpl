{{include file="elements/header.tpl"}}
<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
  Configuração / Termos & Regulamento
  </ol>

  <form method="POST" class="formDefault">
    <input type="hidden" name="id" value="{{$data.id}}" />
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header card-header-f">
                <strong>Formulário</strong>
                <div class="card-header-actions">
                  <a href="{{$uri_module}}" class="btn btn-info text-white">
                    <i class="fa fa-reply"></i> Voltar
                  </a>
                  <button class="btn btn-success text-white btn-save" name="action" value="save" type="submit">
                      <i class="fa fa-save"></i> Salvar
                  </button>
                </div>
              </div>

              {{if $error && count($error)}}
              <div class="alert alert-{{$error.error_type}} text-center">{{$error.error_string}}</div>
              {{/if}}

              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <div class="form-group">
                      <label class="control-label" for="departament">Termo/Regulamento <small class="obrigatorio">*</small></label>
                      <textarea class="form-control content" rows="3" name="text">{{$data.text}}</textarea>
                    </div>
                  </div>

                  <div class="alert alert-warning text-center col-12">
                    <b>ATENÇÃO:</b> Ao realizar qualquer alteração de texto em termos/regulamento, todos os usuários deverão aceitar o novo termos/regulamento. <br />
                    De acordo com as leis de proteção de dados do usuário, a solicitação do "concordo com os termos" do usuário, ocorrerá no próximo login ou cadastro de um novo usuário.
                  </div>

                </div>
                <!-- /.row-->
              </div>

            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->

      </div>
    </div>
  </form>
</main>
{{include file="elements/footer.tpl"}}

<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script type="text/javascript">
  tinymce.init({
    selector: '.content',
    allow_html_in_named_anchor: true,

    height: 350,
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
    ],
    image_advtab: true,
    entity_encoding: "raw",


    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt',
    menubar: false,

    toolbar: 'insertfile undo redo | bullist numlist | bold italic underline strikethrough |styleselect | link ',
    content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tinymce.com/css/codepen.min.css'
    ],


    paste_data_images: true,
    media_poster: false,
    media_alt_source: false,
    media_live_embeds: true,
    media_filter_html: false,

    paste_word_valid_elements: "b,strong,i,u",

    external_filemanager_path: "tinymce/addon/filemanager/",
    filemanager_title: "Filemanager",
    external_plugins: {
      "filemanager": "{{$SITE_URL}}tinymce/addon/filemanager/plugin.min.js"
    }
  });
</script>