{!! Form::open(['url'=>'buscar','method'=>'GET','autocomplete'=>'off','role'=>'serch'])!!}
<div class="form-group">
  <div class="input-group">
  	<span class="input-group-btn">   	
	<button type="button" class="btn btn-primary" onclick="ant('#searchText')"><</button></span>	
	 <span class="input-group-btn" style="padding-right:5px">   	
	<button type="button" class="btn btn-primary" onclick="sig('#searchText')">></button></span>	
    <input type="text" id="searchText" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
   
    <span class="input-group-btn">
      <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</div>

