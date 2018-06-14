{!! Form::model(Request::only('filtro'),['route'=>'comparar.index','method'=>'GET','autocomplete'=>'off','role'=>'search','class'=>'form-inline'])!!}

  
  
   
      <span>Comparar Producto </span>    
      <div class="form-group form-inline pull-right"> 
    {!! Form::select('filtro',$filtro,null,['class'=>'form-control form-inline'])!!}
    <button type="submit" class="btn btn-default">Filtrar</button>
    
  
    
{{Form::close()}}
</div>
