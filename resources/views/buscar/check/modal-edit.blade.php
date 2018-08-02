<div class="modal fade"  role="dialog"  id="modal-edit-{{$bor->id}}">    
    <div class="modal-dialog modal-sm" >
      <div class="modal-content">
        <div class="modal-header" style="background-color:#F3EA5D">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">Editar Descripcion<br> Codigo:{{$bor->code}} - Style:{{$bor->style}}</h4>
        </div>
        <div class="modal-body">
             <input type="hidden" class="form-control" name="id" value="{{$bor->id}}">
             <input type=hidden name="idfacebook" value="{{$bor->idfacebook}}"> 
             <textarea  rows="38" name="name" id="name{{$n}}" value="{{$bor->name}}" class="form-control" placeholder="Comentarios...">{{$bor->name}}</textarea>                   
             <img src="{{$bor->foto}}" width="260px" style="margin: auto">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-edit" onclick="edit('{{$bor->id}}')">Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>  
    </div>
</div>
