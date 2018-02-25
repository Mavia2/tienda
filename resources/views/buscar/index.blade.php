@extends ('layouts.admin')
@section ('titulo')  Buscar producto
@endsection
@section ('contenido')
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
  <div class="row">
      <ul class="nav nav-tabs">
         @if ($searchText2) 
        <li role="presentation"><a href="#tab1" data-toggle="tab">Buscar en Web</a></li>
        <li role="presentation" class="active"><a href="#tab2" data-toggle="tab">Buscar en album de Facebook</a></li>
         @else
          <li role="presentation" class="active"><a href="#tab1" data-toggle="tab">Buscar en Web</a></li>
          <li role="presentation"><a href="#tab2" data-toggle="tab">Buscar en album de Facebook</a></li>
         @endif
      </ul>
  </div>
</div>  
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6" style="margin-top: 15px">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6" style="padding-left: 0px">
      <div class="tab-content">
        @if ($searchText2) 
        <div class="tab-pane fade " id="tab1">
        @else
        <div class="tab-pane fade in active" id="tab1">
        @endif
                <div class="panel panel-default">
                   <div class="panel-body">
                      <div class="row">
                         <div class="col-lg-7 col-md-3 col-sm-3 col-xs-12">
                          @include('buscar.search')
                         </div>
                         <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="margin-left: -15px">
                         <button  type="button" class="btn btn-primary" onclick="copyToClipboard('#p1')">C Cod</button>
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          @if ($radio=='hnena' || $radio=='hnene')<a target="_blank" href="http://www.hm.com/us/product/{{substr($col2['codcar'],0,-2)}}?article={{substr($col2['codcar'],0,-1)}}{{substr($col2['codcar'],-1)}}">
                          @else <a target="_blank" href="http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q={{$col2['codcar']}}">
                          @endif
                          <button type="button" class="btn btn-primary">Abrir Web</button></a>
                         </div>
                      </div>  
                      <div class="row">
                        <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                          <div class="table-responsive">      
                            <table class="table table-striped table-condensed table-hover" id="example">
                              <thead style="background-color:#A9D0F5">                                
                                <th style="text-align: center">Codigo Tiendita</th>    
                                <th style="text-align: center">Codigo Web</th>      
                                     
                              </thead> 
                              
                              <tr style="text-align: center">                               
                                <td>{{$col2['cod']}}</td>
                                 <td><div id="p1">{{$col2['codcar']}}</div></td>
                               </tr>
                            </table>
                          </div>
                        </div>
                      </div>  
                      <div class="row">
                        <div class="col-lg-12 col-md-5 col-sm-4 col-xs-4">
                          <img src="{{$col2['url']}}" width="380px">        
                        </div>
                      </div> 
                  </div>
              </div>
            </div>        
            @if ($searchText2) 
            <div class="tab-pane fade in active" id="tab2"> 
            @else
            <div class="tab-pane fade " id="tab2"> 
            @endif
              <div class="panel panel-default">
                <div class="panel-body">
                 <div class="row">
                       <div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
                        @include('buscar.search2')
                       </div>                       
                  </div>  
                  <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                      <div class="table-responsive">                      
                        <table class="table table-striped table-condensed table-hover" id="example">
                          <thead style="background-color:#A9D0F5">
                            <th style="text-align: center">Codigo </th> 
                            <th style="text-align: center">Imagen</th>
                            
                             <th style="text-align: center">Link</th>          
                                 
                          </thead> 
                           @foreach ($face as $fac)   
                          <tr style="text-align: center">          
                            <td>{{$fac['code']}}</td>
                            <td><img src="{{$fac['pic']}}" class="thumbnail"  style="margin-bottom: 0px"></td>
                             
                            <td>
                              <input type="hidden" id="p2" value="{{$fac['lin']}}">
                              <button  type="button" class="btn btn-default btn-group-justified" onclick="copyToClipboard2('#p2')">Copiar link</button>
                              <a target="_blank" href="{{$fac['lin']}}" ><button type="button" class="btn btn-primary btn-group-justified" style="margin-top: 5px">Abrir facebook</button></a> </td>
                                           
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
     

<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
  <div class="row">

    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
         
          <label class="btn btn-primary active btn-group-justified">
           @if($radio=='cbeba')<input type="radio" name="radio" id="radio1" value="cbeba" checked><strong>&nbsp &nbsp Bebas</strong></label>
           @else<input type="radio" name="radio" id="radio1" value="cbeba"><strong>&nbsp &nbsp Bebas</strong></label>
           @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
          
           <label class="btn btn-primary active btn-group-justified">
          @if($radio=='cbebe')<input type="radio" name="radio" id="radio2" value="cbebe" checked><strong>&nbsp &nbsp Bebes</strong></label>
          @else <input type="radio" name="radio" id="radio2" value="cbebe" ><strong>&nbsp &nbsp Bebes</strong></label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
          
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='cnena')<input type="radio" name="radio" id="radio2" value="cnena" checked><strong>&nbsp &nbsp Nenas</strong></label>  
          @else<input type="radio" name="radio" id="radio2" value="cnena" ><strong>&nbsp &nbsp  Nenas</strong></label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/carters.jpg" style="margin-top:30%; width:85%">
        <div class="caption" style="margin-top:50px">
          
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='cnene')<input type="radio" name="radio" id="radio2" value="cnene" checked><strong>&nbsp &nbsp Nenes</strong></label>
          @else<input type="radio" name="radio" id="radio2" value="cnene" ><strong>&nbsp &nbsp Nenes</strong></label>
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
          @if($radio=='hnena')<input type="radio" name="radio" id="radio2" value="hnena" checked><strong>&nbsp &nbsp Nenas y bebas</strong></label>
          @else<input type="radio" name="radio" id="radio2" value="hnena" ><strong>&nbsp &nbsp Nenas y bebas</strong></label>
          @endif
        </div>
      </div>
    </div>   
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/H_and_M.jpg" style="width:80%">
        <div class="caption" style="margin-top:-7px">
          
          
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='hnene')<input type="radio" name="radio" id="radio2" value="hnene" checked><strong>&nbsp &nbsp Nenes y bebes</strong></label>
          @else<input type="radio" name="radio" id="radio2" value="hnene" ><strong>&nbsp &nbsp Nenes y bebes</strong></label>
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
          @if($radio=='skip')<input type="radio" name="radio" id="radio2" value="skip" checked><strong>&nbsp &nbsp Skip Hop</strong></label>
          @else<input type="radio" name="radio" id="radio2" value="skip" ><strong>&nbsp &nbsp Skip Hop</strong></label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail" style="height: 200px">
        <img src="/images/logos/auto.png" style="width:90%; margin-left: 5px">
        <div class="caption" style="margin-top:10px">
         
          <label class="btn btn-primary active btn-group-justified">
          @if($radio=='auto')<input type="radio" name="radio" id="radio2" value="auto" checked><strong>&nbsp &nbsp Auto Matico</strong></label>
          @else<input type="radio" name="radio" id="radio2" value="auto" ><strong>&nbsp &nbsp Auto Matico</strong></label>
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

  
function copyToClipboard(elemento) {
  var $temp = $("<input>")
  $("body").append($temp);
  $temp.val($(elemento).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

function copyToClipboard2(elemento) {
  var $temp2 = $("<input>")
  $("body").append($temp2); 
  $temp2.val($(elemento).val()).select();
  document.execCommand("copy");
  $temp2.remove();
}

 function sig(elemento) {
  var $tempp =$(elemento).val();
  $tempp = parseInt($tempp)+1;
  var $url = 'http://tienda.ar/buscar?searchText='+ $tempp;  
  var $link =$(elemento).attr('action');
  window.location.href = $url;   
}
function ant(elemento) {
  var $tempp =$(elemento).val();
  $tempp = parseInt($tempp)-1;
  var $url = 'http://tienda.ar/buscar?searchText='+ $tempp;  
  var $link =$(elemento).attr('action');
  window.location.href = $url;   
}






    
</script>
@endpush

@endsection
