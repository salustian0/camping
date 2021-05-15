<table class="table table-hover">
<thead>
  <tr>
  <th></th>
    <th>ID</th>
    <th>Cliente responsável</th>
    <th class="bg-light">Nome do acompanhante</th>
    <th>Documento do responsável</th>
    <th>Data de registro</th>
  </tr>
</thead>
<tbody class="table-body">
{{foreach item=$v from=$listing}}
  <tr>
  <td class="align-middle">
    <input style="width:20px; height:20px" type="checkbox" class="form-control" name="id[]" value="{{$v.id}}">
  </td>
  <td class="align-middle">{{$v.id}}</td>
  <td class="align-middle">{{$v.responsible}}</td>
  <td class="align-middle bg-light">{{$v.name}}</td>
  <td class="align-middle">{{$v.responsible_docNumber}}</td>
  <td class="align-middle">
    {{$v.dtRegister}}</br>
    {{if $v.dtUpdate}}
    <span class="small"><strong>Última atualização:</strong> {{$v.dtUpdate}}</span></br>
    {{/if}}
    {{if $v.lastAccess}}
      <span class="small"><strong>Último acesso:</strong> {{$v.lastAcess}}</span>
    {{/if}}
  </td>
 </tr>
{{/foreach}}
</tbody>
</table>