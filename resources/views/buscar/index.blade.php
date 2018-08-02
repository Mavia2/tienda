@extends ('layouts.admin')
@section ('titulo')  Buscar producto
@endsection
@section ('contenido')
 
        <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              @include('buscar.search')
             </div>
             <div class="col-lg-9 col-md-3 col-sm-3 col-xs-12" style="margin-left: -15px">
             <button  type="button" class="btn btn-primary" onclick="copyToClipboard('#p1')">Copiar Style</button>
             
             
              <a target="_blank" href="{{$face->get('0')['lin']}}" ><button type="button" class="btn btn-primary">Abrir facebook</button></a> 
             
                     
                   @if (mb_substr($searchText,0,1)=="1" || mb_substr($searchText,0,1)=="2" || mb_substr($searchText,0,1)=="3" || mb_substr($searchText,0,1)=="4" || mb_substr($searchText,0,1)=="7") 
                    <a target="_blank" href="http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q={{$col2->style}}">
                   @else
                   <a target="_blank" href="http://www2.hm.com/en_us/productpage.{{$col2->style}}.html">
                   @endif            
              <button type="button" class="btn btn-primary">Abrir Web</button></a>           
            </div>
          </div>
         {{Form::close()}}
        <div class="row">
          <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
            <div class="table-responsive">      
              <table class="table table-striped table-condensed table-hover" id="example">
                <thead style="background-color:#A9D0F5">                                
                  <th style="text-align: center">Codigo Tienda</th>    
                  <th style="text-align: center">Style</th>
                  <th style="text-align: center">Disponibilidad</th> 
                  <th style="text-align: center">Descripcion</th>
                  <th style="text-align: center">Imagen</th>                       
                </thead>               
                <tr style="text-align: center">                               
                  <td><textarea class="form-control text-center" readonly  rows="23">{{$col2->code}}</textarea></td>
                   <td><textarea class="form-control text-center" readonly  rows="23" id="p1">{{$col2->style}}</textarea></td>
                   <td><textarea class="form-control text-center" readonly  rows="23">{{$disp}}</textarea></td>
                   <td><textarea class="form-control" readonly cols="60" rows="23">{{mb_substr($face->get('0')['name'],6)}}</textarea></td>
                   <td><img src="{{$col2->foto}}" width="380px"></td>                   
                </tr>
              </table>
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
