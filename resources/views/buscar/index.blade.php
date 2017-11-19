@extends ('layouts.admin')
@section ('titulo')  Buscar producto
@endsection
@section ('contenido')


<div class="row">
   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
    @include('buscar.search')
   </div>
 <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12" style="margin-left: -15px">
 <button  class="btn btn-primary" onclick="copyToClipboard('#p1')">Copiar Codigo</button>
 </div>
 <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
  <a target="_blank" href="http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q={{$col2['codcar']}}"" ><button type="submit" class="btn btn-primary">Abrir Carters</button></a>
 </div>
  </div>
  
  
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="table-responsive">      
      <table class="table table-striped table-condensed table-hover" id="example">
        <thead style="background-color:#A9D0F5">
          <th style="text-align: center">Codigo Carters</th>
          <th style="text-align: center">Codigo Tiendita</th>          
               
        </thead> 
        
        <tr style="text-align: center">          
          <td><div id="p1">{{$col2['codcar']}}</div></td>
          <td>{{$col2['cod']}}</td>
         </tr>
         </table>
          </div>
          </div>
          </div>
          <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-4 col-xs-4">
          
          <img src="{{$col2['url']}}" width="435px">
        
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


 






    
</script>
@endpush

@endsection
