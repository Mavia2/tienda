@extends ('layouts.admin')
@section ('titulo')  
<span class="col-lg-2 col-md-1 col-sm-1 col-xs-12" style="padding-left:0">Sincronizar album </span>  
<div class="col-lg-5 col-md-2 col-xs-12 " style="padding-right:0; margin-left:40px"> 
   <div class="form-group  ">          
    <div class="form-group form-inline pull-right"> 
       {!! Form::model(Request::only('filtroAlbum'), ['route'=>['formavieja.index'],'method'=>'GET', 'autocomplete'=>'off','role'=>'search'])!!} 
     <button type="submit" class="btn btn-default" style="margin-right:15px">Filtrar</button>    
       <span style="font-size:15px">Album</span>          
       {!! Form::select('filtroAlbum',$filtroAlbum,null,['class'=>'form-control','id'=>'filtroAlbum'])!!}        
    {{Form::close()}}
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-8 col-sm-8 col-xs-6 ">   
      {!!Form::open(Request::only('filtroAlbum'),['url'=>'formavieja','method'=>'POST','autocomplete'=>'off', 'filtroAlbum'=>'filtroAlbum' ])!!}
      {{Form::token()}}
      <button  type="submit" class="btn btn-primary pull-right">Sincronizar album</button>
    {!! Form::select('filtroAlbum',$filtroAlbum,null,['class'=>'form-control','id'=>'filtroAlbum'])!!} 
    {{Form::close()}} 
    
 </div>
   

@endsection
@section ('contenido')


    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-left: 0px">
      <div class="tab-content">               
              <div class="panel panel-default">
                <div class="panel-body">                
                  <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                      <span>Facebook</span>
                      <div class="table-responsive">                      
                        <table class="table table-striped table-condensed table-hover" id="example">
                          <thead style="background-color:#A9D0F5"> 
                            <th style="text-align: center">nº </th>                           
                            <th style="text-align: center">Album </th> 
                            <th style="text-align: center">Id Facebook </th>
                            <th style="text-align: center">Codigo</th> 
                            <th style="text-align: center">Style</th>
                            <th style="text-align: center">Imagen</th>
                            <th style="text-align: center">Descripcion</th>
                            <th style="text-align: center">Link</th>                          
                          </thead> 
                           @php $n=0;@endphp
                           @foreach ($listaFacebook as $bor)   
                          <tr style="text-align: center"> 
                            <td>{{$n}}</td>                             
                            <td>{{$radio}}</td>
                            <td>{{$bor['idfacebook']}}</td>
                            <td>{{$bor['code']}}</td>
                            @if (array_key_exists('style',$bor))                            
                            <td>{{$bor['style']}}</td>                            
                            @else
                            <td></td> 
                            @endif                           
                            <td style="text-align: center"><img src="{{$bor['pic']}}" width="40px" data-toggle="modal" data-target="#myModal{{$n}}" class="img-thumbnail">
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal{{$n}}" role="dialog">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="text-align: center">Codigo: {{$bor['code']}} - Style: </h4>
                                        </div>
                                        <div class="modal-body">
                                          <img src="{{$bor['img']}}" width="520px" style="margin: auto">
                                        </div>        
                                      </div>
                                    </div>
                                  </div>
                        @php $n++; @endphp</td>                             
                            <td>{{$bor['name']}}</td>
                            <td><a ref="{{$bor['link']}}">link</a> </td>
                            
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
        
     

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <div class="row">
    <div class="tab-content">               
              <div class="panel panel-default">
                <div class="panel-body">                
                  <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                      <span>Base Datos</span>
                      <div class="table-responsive">                      
                        <table class="table table-striped table-condensed table-hover" id="example">
                          <thead style="background-color:#A9D0F5"> 
                            <th style="text-align: center">nº </th>                           
                            <th style="text-align: center">Album </th> 
                            <th style="text-align: center">Id Facebook </th>
                            <th style="text-align: center">Codigo</th> 
                            <th style="text-align: center">Style</th>
                            <th style="text-align: center">Imagen</th>
                            <th style="text-align: center">Descripcion</th>
                            <th style="text-align: center">Link</th>                          
                          </thead> 
                           @php $n=0;@endphp
                           @foreach ($listaMysql as $bor)   
                          <tr style="text-align: center"> 
                            <td>{{$n}}</td>                             
                            <td>{{$radio}}</td>
                            <td>{{$bor->idfacebook}}</td>
                            <td>{{$bor->code}}</td>                                                     
                            <td>{{$bor->style}}</td>                                                  
                            <td style="text-align: center"><img src="{{$bor->pic}}" width="40px" data-toggle="modal" data-target="#myModal{{$n}}" class="img-thumbnail">
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal{{$n}}" role="dialog">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="text-align: center">Codigo: {{$bor->code}} - Style: {{$bor->style}} </h4>
                                        </div>
                                        <div class="modal-body">
                                          <img src="{{$bor->foto}}" width="520px" style="margin: auto">
                                        </div>        
                                      </div>
                                    </div>
                                  </div>
                        @php $n++; @endphp</td>                             
                            <td>{{$bor->name}}</td>
                            <td><a ref="{{$bor->link}}">link</a> </td>
                            
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

     
</script>
@endpush

@endsection
