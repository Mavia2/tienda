{!! Form::open(['url'=>'buscar','method'=>'GET','autocomplete'=>'off','role'=>'serch'])!!}
<div class="form-group">
  <div class="input-group">
  	<span class="input-group-btn">   	
	<button type="button" class="btn btn-primary" onclick="ant2('#searchText2')"><</button></span>	
	 <span class="input-group-btn" style="padding-right:5px">   	
	<button type="button" class="btn btn-primary" onclick="sig2('#searchText2')">></button></span>	
    <input type="text" class="form-control" id="searchText2" name="searchText2" placeholder="Buscar..." value="{{$searchText2}}">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</div>

