@extends ('layouts.admin')
@section ('titulo')  Sincronizar album
@endsection
@section ('contenido')


    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6" style="padding-left: 0px">
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
                            <th style="text-align: center">Imagen</th>
                            <th style="text-align: center">Album</th>
                            <th style="text-align: center">Accion</th>                          
                          </thead> 
                           @php $n=0;@endphp
                           @foreach ($borr as $bor)   
                          <tr style="text-align: center">          
                            <td>{{$bor['cod']}}</td>
                            <td>{{$bor['codcar']}}</td>
                            <td style="text-align: center"><img src="{{$bor['url']}}" width="40px" data-toggle="modal" data-target="#myModal{{$n}}" class="img-thumbnail">
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal{{$n}}" role="dialog">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="text-align: center">Codigo: {{$bor['cod']}} - Style: {{$bor['codcar']}}</h4>
                                        </div>
                                        <div class="modal-body">
                                          <img src="{{$bor['url']}}" width="520px" style="margin: auto">
                                        </div>        
                                      </div>
                                    </div>
                                  </div>
                        @php $n++; @endphp</td>                             
                            <td>{{$bor['alb']}} </td>
                            <td>  
                              <a href="" data-target="#eModal{{$n}}" data-toggle="modal"><button class="btn btn-danger btn-sm">Eliminar</button></a>
                               
                               <!-- Modal comment-->
                                      <div class="modal fade" id="eModal{{$n}}" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                             <div class="modal-header" style="background-color:#F4364C">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title" style="text-align: center">Eliminar </h4>
                                            </div>
                                            <div class="modal-body">
                                              
                                                
                                                  {!!Form::open(['method'=>'GET','action'=>['SyncController@elimi']])!!}
                                                  
                                                 
                                                  <input type="hidden" class="form-control" name="id" value="{{$bor['url']}}">
                                                 
                                                 
                                                <div class="form-group">
                                                  <span>Codigo: {{$bor['cod']}} - Style: {{$bor['codcar']}}</span>
                                                  <img src="{{$bor['url']}}" width="200px" style="margin: auto">
                                                </div>
                                             
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-danger">Eliminar</button>
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
        
     

<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
  <div class="row">
    {!! Form::open(['url'=>'sync','method'=>'GET','autocomplete'=>'off','role'=>'serch'])!!}
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
         
          <label class="btn btn-primary active btn-group-justified">
            
           @if($radio=='cbeba')<input onChange="this.form.submit();" type="radio" name="radio" id="radio1" value="cbeba" checked><strong>&nbsp &nbsp Bebas</strong></label>
           @else<input onChange="this.form.submit();" type="radio" name="radio" id="radio1" value="cbeba"><strong>&nbsp &nbsp Bebas</strong></label>
           @endif
          
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
          
           <label class="btn btn-primary active btn-group-justified">
          @if($radio=='cbebe')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="cbebe" checked><strong>&nbsp &nbsp Bebes</strong></label>
          @else <input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="cbebe" ><strong>&nbsp &nbsp Bebes</strong></label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
          
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='cnena')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="cnena" checked><strong>&nbsp &nbsp Nenas</strong></label>  
          @else<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="cnena" ><strong>&nbsp &nbsp  Nenas</strong></label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
          
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='cnene')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="cnene" checked><strong>&nbsp &nbsp Nenes</strong></label>
          @else<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="cnene" ><strong>&nbsp &nbsp Nenes</strong></label>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/H_and_M.jpg" style="width:80%">
        <div class="caption" style="margin-top:-7px">                    
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='hnena')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="hnena" checked><strong>&nbsp &nbsp Nenas y bebas</strong></label>
          @else<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="hnena" ><strong>&nbsp &nbsp Nenas y bebas</strong></label>
          @endif
        </div>
      </div>
    </div>   
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/H_and_M.jpg" style="width:80%">
        <div class="caption" style="margin-top:-7px">
          
          
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='hnene')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="hnene" checked><strong>&nbsp &nbsp Nenes y bebes</strong></label>
          @else<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="hnene" ><strong>&nbsp &nbsp Nenes y bebes</strong></label>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/skip.png" style="width:90%; margin-left: 5px">
        <div class="caption" >
         
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='skip')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="skip" checked><strong>&nbsp &nbsp Skip Hop</strong></label>
          @else<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="skip" ><strong>&nbsp &nbsp Skip Hop</strong></label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/auto.png" style="width:90%; margin-left: 5px">
        <div class="caption" style="margin-top:10px">
         
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='auto')<input onChange="this.form.submit();" type="radio" name="radio" id="radio2" value="auto" checked><strong>&nbsp &nbsp Auto Matico</strong></label>
          @else<input onChange="this.form.submit();"type="radio" name="radio" id="radio2" value="auto" ><strong>&nbsp &nbsp Auto Matico</strong></label>
          @endif
        </div>
      </div>
    </div>
  </div>
{{Form::close()}}
</div>
</div>


@push ('script')
<script>

     
</script>
@endpush

@endsection
