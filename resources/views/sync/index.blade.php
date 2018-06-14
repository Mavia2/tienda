@extends ('layouts.admin')
@section ('titulo')  Sincronizar albumnes
@endsection
@section ('contenido')


  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-1">      
      {!! Form::open(['url'=>'sync','method'=>'GET','autocomplete'=>'off','role'=>'serch'])!!}
      <div class="form-group form-inline pull-left">
      {!! Form::select('radio',$filtro,null,['class'=>'form-control form-inline', 'id'=>'radio'])!!}
      <button type="submit" class="btn btn-default">Filtrar</button>
      </div>
      {{Form::close()}}
    </div>
    <div class="col-lg-9 col-md-1">
      <div class="form-group form-inline pull-right">           
        <button class="btn btn-default" onclick="sincAlbum('{{$radio}}')">Sincronizar album</button>            
        <button class="btn btn-primary">Sincronizar todo</button>
        
      </div>
    </div>
  </div>
    
  <div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
      <div class="tab-content">               
              <div class="panel panel-default">
                <div class="panel-body">                
                  <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                      <div class="table-responsive">                      
                        <table class="table table-striped table-condensed table-hover" id="example">
                          <thead style="background-color:#A9D0F5">                           
                            <th style="text-align: center">Codigo </th> 
                             <th style="text-align: center">Style </th>
                              <th style="text-align: center">Descripcion Sistema </th>
                              <th style="text-align: center">Descripcion Facebook </th>  
                            <th style="text-align: center">Imagen</th>
                            <th style="text-align: center">Album</th>
                            <th style="text-align: center">Accion</th>                          
                          </thead> 
                           @php $n=0;@endphp
                           @foreach ($borr as $bor)   
                          <tr style="text-align: center">  
                                  
                            <td>{{$bor['code']}}</td>
                            <td>{{$bor['style']}}</td>
                            <td><textarea class="form-control " readonly cols ="6" rows="7">{{$bor['namedb']}}</textarea></td>
                            <td><textarea class="form-control " readonly cols ="6" rows="7">{{$bor['nameface']}}</textarea></td>
                            <td style="text-align: center"><img src="{{$bor['img']}}" width="125px" data-toggle="modal" data-target="#myModal{{$n}}" class="img-thumbnail">
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal{{$n}}" role="dialog">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="text-align: center">Codigo: {{$bor['code']}} - Style: {{$bor['style']}}</h4>
                                        </div>
                                        <div class="modal-body">
                                          <img src="{{$bor['img']}}" width="520px" style="margin: auto">
                                        </div>        
                                      </div>
                                    </div>
                                  </div>
                        @php $n++; @endphp</td>                             
                            <td>{{$bor['alb']}} </td>
                            <td>  
                              <a href="" data-target="#eModal{{$n}}" data-toggle="modal"><button class="btn btn-danger btn-sm">Sincronizar</button></a>
                               
                               <!-- Modal comment-->
                                <div class="modal fade" id="eModal{{$n}}" role="dialog">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                       <div class="modal-header" style="background-color:#F4364C">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align: center">Sincronizar </h4>
                                        <span>Codigo: {{$bor['code']}} - Style: {{$bor['style']}}</span>
                                      </div>
                                      <div class="modal-body">
                                        
                                          
                                            {!!Form::open(['method'=>'GET','action'=>['SyncController@elimi']])!!}
                                            
                                           
                                            <input type="hidden" class="form-control" name="id" value="{{$bor['id']}}">
                                            <input type="hidden" class="form-control" name="nameface" value="{{$bor['nameface']}}">
                                           
                                          <label>Nueva Descripcion</label> 
                                          <div class="form-group">
                                            
                                            
                                            <textarea class="form-control " readonly cols ="6" rows="7">{{$bor['nameface']}}</textarea>
                                            <img src="{{$bor['img']}}" width="200px" style="margin: auto">
                                          </div>
                                       
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Sincrinozar</button>
                                      </div>
                                      {!!Form::close()!!}                                                 
                                    </div>
                                  </div>
                                </div> 
                                  <!-- End Modal-->
                                           </td>
                           </tr>
                               @endforeach
                        </table>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div> 
          </div> 

                              
        
     




@push ('script')
<script>
function sincAlbum(radio){
 console.log(radio) 
 $.ajax({
          url: 'http://tienda.ar/sync/album',
          type: 'GET',          
          data: {radio:radio}
          })
              .done(function(data) {
              console.log("ok", data);
              window.location.replace("http://tienda.ar/sync?radio="+data);

              })
              .fail(function(data) {
              })                
              .always(function() {
                console.log("complete");
              });  
} 

</script>
@endpush

@endsection
