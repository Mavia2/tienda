{!! Form::open(['url'=>'buscar\check','method'=>'GET','autocomplete'=>'off','role'=>'serch'])!!}
<div class="form-group">
  <div class="input-group">
  	<span class="input-group-btn">   	
	<button type="button" class="btn btn-default" onclick="ant('#idd')"><</button></span>	
	 <span class="input-group-btn" style="padding-right:5px">   	
	<button type="button" class="btn btn-default" onclick="sig('#idd')">></button></span>	
    <input type="text" id="searchText" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
    <input type="hidden" id="idd" class="form-control"  value="{{$col2->id}}">
   
    <span class="input-group-btn">
      <button type="button"  class="btn btn-default" onclick="buscarAjax('#searchText')">Buscar</button>
  </div>
</div>

