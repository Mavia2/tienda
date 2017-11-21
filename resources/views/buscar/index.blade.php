@extends ('layouts.admin')
@section ('titulo')  Buscar producto
@endsection
@section ('contenido')

<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
  <div class="row">
     <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
      @include('buscar.search')
     </div>
     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12" style="margin-left: -15px">
     <button  class="btn btn-primary" onclick="copyToClipboard('#p1')">Copiar Codigo</button>
     </div>
     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      @if ($radio=='hnena' || $radio=='hnene')<a target="_blank" href="http://www.hm.com/us/product/{{substr($col2['codcar'],0,-1)}}?article={{substr($col2['codcar'],0,-1)}}-{{substr($col2['codcar'],-1)}}">
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
            <th style="text-align: center">Codigo Web</th>
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

<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
  <div class="row">

    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <label class="btn btn-primary active">
           @if($radio=='cbeba')<input type="radio" name="radio" id="radio1" value="cbeba" checked>&nbsp &nbsp Carter´s Beba</label>
           @else<input type="radio" name="radio" id="radio1" value="cbeba">&nbsp &nbsp Carter´s Beba</label>
           @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
           <label class="btn btn-primary active">
          @if($radio=='cbebe')<input type="radio" name="radio" id="radio2" value="cbebe" checked>&nbsp &nbsp Carter´s Bebe</label>
          @else <input type="radio" name="radio" id="radio2" value="cbebe" >&nbsp &nbsp Carter´s Bebe</label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <label class="btn btn-primary active">
          @if($radio=='cnena')<input type="radio" name="radio" id="radio2" value="cnena" checked>&nbsp &nbsp Carter´s Nena</label>  
          @else<input type="radio" name="radio" id="radio2" value="cnena" >&nbsp &nbsp Carter´s Nena</label>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <label class="btn btn-primary active">
          @if($radio=='cnene')<input type="radio" name="radio" id="radio2" value="cnene" checked>&nbsp &nbsp Carter´s Nene</label>
          @else<input type="radio" name="radio" id="radio2" value="cnene" >&nbsp &nbsp Carter´s Nene</label>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <label class="btn btn-primary active">
          @if($radio=='hnena')<input type="radio" name="radio" id="radio2" value="hnena" checked>&nbsp &nbsp hym Nenas y bebas</label>
          @else<input type="radio" name="radio" id="radio2" value="hnena" >&nbsp &nbsp hym Nenas y bebas</label>
          @endif
        </div>
      </div>
    </div>   
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="/images/logos/H_and_M.jpg" alt="...">
        <div class="caption">
          <h3>Nenes y Bebes</h3>
          
          <label class="btn btn-primary active">
          @if($radio=='hnene')<input type="radio" name="radio" id="radio2" value="hnene" checked>&nbsp &nbsp hym Nenes y bebes</label>
          @else<input type="radio" name="radio" id="radio2" value="hnene" >&nbsp &nbsp hym Nenes y bebes</label>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <label class="btn btn-primary active">
          @if($radio=='skip')<input type="radio" name="radio" id="radio2" value="skip" checked>&nbsp &nbsp Skip*Hop</label>
          @else<input type="radio" name="radio" id="radio2" value="skip" >&nbsp &nbsp Skip*Hop</label>
          @endif
        </div>
      </div>
    </div>
  </div>
{{Form::close()}}
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
