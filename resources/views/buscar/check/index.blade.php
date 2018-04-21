@extends ('layouts.admin')
@section ('titulo')  Checkear Disponibilidad de Producto
@endsection
@section ('contenido')
<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6" style="padding-left: 0px">
    <div class="tab-content">        
              <div class="panel panel-default">
                 <div class="panel-body">
                    <div class="row">
                       <div class="col-lg-7 col-md-3 col-sm-3 col-xs-12">
                        @include('buscar.check.searchAjax')
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-left: 8px; ">
                       <!-- <button  type="button" class="btn btn-primary" onclick="copyToClipboard('#p1')">Copiar</button> !-->
                       <div id="abrirFaceboock"><a target="_blank" href="{{$col2->link}}"><button  type="button" class="btn btn-primary">Abrir Facebook</button></a></div></div>
                       
                       <div id="abrirWeb">
                        @if ($radio=='hnena' || $radio=='hnene')<a target="_blank" href="http://www.hm.com/us/product/{{substr($col2->style,0,-2)}}?article={{substr($col2->style,0,-1)}}{{substr($col2->style,-1)}}">
                        @elseif (($radio=='auto' || !$radio))
                             @if (mb_substr($searchText,0,1)=="1" || mb_substr($searchText,0,1)=="2" || mb_substr($searchText,0,1)=="3" || mb_substr($searchText,0,1)=="4" || mb_substr($searchText,0,1)=="7") 
                              <a target="_blank" href="http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q={{$col2->style}}">
                             @else
                             <a target="_blank" href="http://www.hm.com/us/product/{{substr($col2->style,0,-2)}}?article={{substr($col2->style,0,-1)}}{{substr($col2->style,-1)}}">
                             @endif                          
                        @else <a target="_blank" href="http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q={{$col2->style}}">
                        @endif
                       
                        <button type="button" class="btn btn-primary">Abrir Web</button></a> </div>
                       
                    </div>  
                    <div class="row">
                      <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                        <div class="table-responsive">      
                          <table class="table table-striped table-condensed table-hover " id="example">
                            <thead style="background-color:#A9D0F5">                                
                              <th style="text-align: center">Codigo Tienda</th>    
                              <th style="text-align: center">Style</th>
                              <th style="text-align: center">Descripcion</th>
                              <th style="text-align: center">Disponibilidad</th>
                              <th style="text-align: center">Imagen</th>      
                                   
                            </thead> 
                            
                            <tr style="text-align: center">                               
                              <td><textarea class="form-control text-center" readonly cols ="5" rows="14" id="p4">{{$col2->code}}</textarea></td>
                              <td><textarea class="form-control text-center" readonly cols ="5" rows="14" id="p1">{{$col2->style}}</textarea></td>
                              <td><textarea class="form-control" readonly cols ="12" rows="14" id="p5">{{$col2->name}}</textarea></td>
                              <td><div id="p2"><textarea class="form-control text-center" readonly cols ="12" rows="14">{{$disp}}</textarea></div></td>
                               <td><div id="p3"><img src="{{$col2->foto}}" width="195px"></div></td>
                             </tr>
                          </table>
                        </div>
                      </div>
                    </div>                      
                </div>
    </div>            
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="thumbnail" style="height: 220px">
        <div class="col-sm-4 col-md-4">
          <img src="/images/logos/carters.jpg" style="margin-top:5%; width:75%">
          <div class="caption" style="margin-top:5px">           
            <div>
             @if($radio=='cbeba')<input type="radio" name="radio" id="radio1" value="cbeba" checked><label><strong>&nbsp &nbsp Bebas</strong></label>
             @else<input type="radio" name="radio" id="radio1" value="cbeba"><label><strong>&nbsp &nbsp Bebas</strong></label>
             @endif
           </div>
            <div>
             @if($radio=='cbebe')<input type="radio" name="radio" id="radio2" value="cbebe" checked><label><strong>&nbsp &nbsp Bebes</strong></label>
             @else <input type="radio" name="radio" id="radio2" value="cbebe" ><label><strong>&nbsp &nbsp Bebes</strong></label>
             @endif
             </div>
             @if($radio=='cnena')<input type="radio" name="radio" id="radio2" value="cnena" checked><label><strong>&nbsp &nbsp Nenas</strong></label>  
             @else<input type="radio" name="radio" id="radio2" value="cnena" ><label><strong>&nbsp &nbsp  Nenas</strong></label>
             @endif
           <div>
             @if($radio=='cnene')<input type="radio" name="radio" id="radio2" value="cnene" checked><label><strong>&nbsp &nbsp Nenes</strong></label>
             @else<input type="radio" name="radio" id="radio2" value="cnene" ><label><strong>&nbsp &nbsp Nenes</strong></label>
             @endif
            </div> 
          </div>
        </div>
        <div class="col-sm-4 col-md-4">        
          <img src="/images/logos/H_and_M.jpg" style="width:30%">
          <div class="caption" style="margin-top:-7px">                    
           <div>
            @if($radio=='hnena')<input type="radio" name="radio" id="radio2" value="hnena" checked><label><strong>&nbsp &nbsp Nenas y bebas</strong></label>
            @else<input type="radio" name="radio" id="radio2" value="hnena" ><label><strong>&nbsp &nbsp Nenas y bebas</strong></label>
            @endif
          </div>
           <div>
             @if($radio=='hnene')<input type="radio" name="radio" id="radio2" value="hnene" checked><label><strong>&nbsp &nbsp Nenes y bebes</strong></label>
            @else<input type="radio" name="radio" id="radio2" value="hnene" ><label><strong>&nbsp &nbsp Nenes y bebes</strong></label>
            @endif
          </div>
          </div>
          </div>
        <div class="col-sm-4 col-md-4"> 
           <img src="/images/logos/skip.png" style="width:30%; margin-left: 5px">
          <div class="caption" >           
            <div>
            @if($radio=='skip')<input type="radio" name="radio" id="radio2" value="skip" checked><label><strong>&nbsp &nbsp Skip Hop</strong></label>
            @else<input type="radio" name="radio" id="radio2" value="skip" ><label><strong>&nbsp &nbsp Skip Hop</strong></label>
            @endif
        </div>
        </div>

        </div>
        <div class="col-sm-12 col-md-12">
       <button class="btn btn-primary btn-block">Listar el Album</button>
       </div> 
      </div>
       </div>
        </div>      
</div>
</div>                           
 {{Form::close()}}
<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
  <div class="row">
    <div class="tab-content">               
              <div class="panel panel-default">
                <div class="panel-body">                
                  <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">                      
                      <div>                      
                        <table class="table table-striped table-condensed table-hover" id="example">
                          <thead style="background-color:#A9D0F5"> 
                            <th style="text-align: center">nº </th>                           
                            <th style="text-align: center">Album </th>                           
                            <th style="text-align: center">Codigo</th> 
                            <th style="text-align: center">Style</th>
                            <th style="text-align: center">Imagen</th>
                            <th style="text-align: center">Accion</th>                                             
                          </thead> 
                           @php $n=1;@endphp
                           @foreach ($lista as $bor)   
                          <tr style="text-align: center" id="f{{$bor->id}}"> 
                            <input type="hidden" id="{{$bor->id}}" class="form-control"  value="{{$bor->code}}">                                                  
                            <td>{{$n}} </td>               
                            <td id="rad{{$n}}">{{$radio}}</td>                           
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
                            <td><button class="btn btn-primary btn-sm" onclick="buscarAjax('#{{$bor->id}}')"> Buscar</button>
                              <a href="" data-target="#modal-delete-{{$bor->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm">Eliminar</button></a>
                            </td>
                           
                            
                           </tr>
                           @include('buscar.check.modal')
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
  
function copyToClipboard(elemento) {
  var $temp = $("<input>")
  $("body").append($temp);
  $temp.val($(elemento).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
  
 function AjaxBusca(code, tempp, radio){
  $('#p3').html('<div style="width:195px "><img src="/images/ajax-loader1.gif" style="margin-top:50% "></div>');
  $.ajax({
          url: 'http://tienda.ar/buscar/check/ajax',
          type: 'GET',          
          data: {code:code, radio:radio}
          })
              .done(function(data) { 
                $("#f"+tempp).css({'background-color':'#D1E4F3'});
                $("#f"+data["id"]).css({'background-color':'#A9D0F5'});
                $("#idd").val(data["id"]);  
                $("#searchText").val(code);               
                $("#p4").text(data["code"]);
                $("#p1").text(data["style"]);
                $("#p5").text(data["name"]);
                $("#p2").html("<textarea class='form-control text-center' readonly cols ='12' rows='14'>"+data["disp"]+"</textarea>");
                $("#p3").html("<img src='"+data["img"]+"' width='195px'>");
                $("#abrirFaceboock").html("<a target='_blank' href='"+data["link"]+"'><button  type='button' class='btn btn-primary'>Abrir Facebook</button></a></div>");
                $("#abrirWeb").html("<a target='_blank' href='"+data["href"]+"'><button type='button' class='btn btn-primary'>Abrir Web</button></a>");               
              })
              .fail(function(data) {
              })                
              .always(function() {
                console.log("complete");
              });  
 } 

 function sig(elemento) {  
  var $tempp =$(elemento).val();
  $tempp = parseInt($tempp);
  $tempp1 = $tempp+1;
  console.log($tempp1);
  var $radio =$("input[name='radio']:checked").val();
  console.log($radio);
  var code=$('#'+$tempp1).val();  
  AjaxBusca(code, $tempp, $radio);
  
}
function ant(elemento) {  
  var $tempp =$(elemento).val();
  $tempp1 = parseInt($tempp)-1;
  var $radio =$("input[name='radio']:checked").val();
  var code =$('#'+$tempp1).val();
  AjaxBusca(code, $tempp, $radio);
}
function buscarAjax(code){
  var code =$(code).val();
  var idd =$('#idd').val();
  var radio =$("input[name='radio']:checked").val();
  console.log(code);
  $('#p3').html('<div style="width:195px "><img src="/images/ajax-loader1.gif" style="margin-top:50% "></div>');
  $.ajax({
          url: 'http://tienda.ar/buscar/check/ajax',
          type: 'GET',          
          data: {code:code, radio:radio}
          })
              .done(function(data) { 
                $("#f"+idd).css({'background-color':'#D1E4F3'});
                $("#f"+data["id"]).css({'background-color':'#A9D0F5'});
                $("#idd").val(data["id"]);  
                $("#searchText").val(code);               
                $("#p4").text(data["code"]);
                $("#p1").text(data["style"]);
                $("#p5").text(data["name"]);
                $("#p2").html("<textarea class='form-control text-center' readonly cols ='12' rows='14'>"+data["disp"]+"</textarea>");
                $("#p3").html("<img src='"+data["img"]+"' width='195px'>");
                $("#abrirFaceboock").html("<a target='_blank' href='"+data["link"]+"'><button  type='button' class='btn btn-primary'>Abrir Facebook</button></a></div>");
                $("#abrirWeb").html("<a target='_blank' href='"+data["href"]+"'><button type='button' class='btn btn-primary'>Abrir Web</button></a>");               
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
