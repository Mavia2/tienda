@extends ('layouts.admin')
@section ('titulo') 
 <div class="col-lg-2 col-md-1 col-sm-1 col-xs-12" style="padding-left:0">Productos <span class="badge">{{$total}}</span></div>
 <div class="col-lg-3 col-md-10 col-sm-10 col-xs-12" Style="margin-top:4px;margin-left:-50px ">
    @include('stock.producto.search')
</div>
<div class="col-lg-7 col-md-8 col-sm-8 col-xs-6 " style="padding-right:0; padding-left:0;margin-left:50px">   
  <button class="btn btn-default pull-right" data-toggle="modal" data-target="#crpModal"  Style="margin-top:4px" href="{{URL::action('ProductoController@create')}}"><i class="fa fa-plus" aria-hidden="true"></i></button>
   </div>

@endsection
@section ('contenido')


<div class="row">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    Cant: {{$total}}
 </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover" id="ex">
        <thead style="background-color:#A9D0F5">
        
          <th>id</th>
          <th>CodeBar</th>
          <th>imagen</th>
          <th>Producto</th>
          <th>Talle</th>
          <th>Style</th>
          <th>Album</th>
          <th>Categoria</th>
          <th>Estacion</th>
          <th>Marca</th>
          <th>Opciones</th>
        </thead>
        @php $nx=0;@endphp
        @foreach ($productos as $pro)
        <tr>
          <td>{{$pro->idproducto}}</td>
          <td>{{$pro->codebar}}</td>
           <td style="text-align: center"><img src="{{$pro->imagen}}" width="30px" data-toggle="modal" data-target="#myModal{{$nx}}" class="img-thumbnail">
                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{$nx}}" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align: center">{{$pro->producto}}</h4>
                              </div>
                              <div class="modal-body">
                                <img src="{{$pro->imagen}}" style="margin: auto">
                              </div>        
                            </div>
                          </div>
                        </div>
                        @php $nx++; @endphp                  
          </td>
          <td>{{$pro->producto}}</td>
          <td>{{$pro->talle}}</td>
          <td>{{$pro->style}}</td>
          <td><span data-toggle="modal" data-target="#alModal{{$nx}}">{{$pro->tipo}}</span></td>
           <!-- Modal -->
                        <div class="modal fade" id="alModal{{$nx}}" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align: center">{{$pro->producto}}</h4>
                              </div>
                              <div class="modal-body">
                                {!!Form::open(['method'=>'POST','action'=>['ProductoController@update2']])!!}
                                    
                                   
                                    <input type="hidden" class="form-control" name="id" value="{{$pro->idproducto}}">
                                    <input type="hidden" class="form-control" name="tipo" value="2">
                                 
                                  <div class="form-group" style="text-align: center">
                                    <label for="precio" class="control-label">Estado:</label>
                                     <select type="text" name="estado"class="form-control">
                                      @if($pro->id_tipo==1)
                                      <option value="1" selected>S/D</option>
                                      <option value="2">Beba</option>
                                      <option value="4">Nena</option>
                                      <option value="3">Bebe</option>                                      
                                      <option value="5">Nene</option>
                                      @elseif($pro->id_tipo=="2")
                                      <option value="1">S/D</option>
                                      <option value="2" selected>Beba</option>
                                      <option value="4">Nena</option>
                                      <option value="3">Bebe</option>                                      
                                      <option value="5">Nene</option>
                                       @elseif($pro->id_tipo=="3")
                                      <option value="1">S/D</option>
                                      <option value="2">Beba</option>
                                      <option value="4">Nena</option>
                                      <option value="3" selected>Bebeb</option>                                      
                                      <option value="5">Nene</option>
                                       @elseif($pro->id_tipo=="4")
                                      <option value="1">S/D</option>
                                      <option value="2">Beba</option>
                                      <option value="4" selected>Nena</option>
                                      <option value="3">Bebe</option>                                      
                                      <option value="5">Nene</option>
                                      @else
                                      <option value="1">S/D</option>
                                      <option value="2">Beba</option>
                                      <option value="4">Nena</option>
                                      <option value="3">Bebe</option>                                      
                                      <option value="5" selected>Nene</option> 
                                      @endif   
                                    </select>     
                                  </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                              </div>
                              {!!Form::close()!!}      
                            </div>
                          </div>
                        </div>
                        
          <td>{{$pro->categoria}}</td>
          <td>{{$pro->estacion}}</td>
          <td>{{$pro->marca}}</td>
          <td>
            <button class="btn btn-info" data-toggle="modal" data-target="#EditModal{{$nx}}">Editar</button>
           
            <a href="{{URL::action('ProductoController@edit2')}}"><button class="btn btn-info">Edit lote</button></a>
            <a href="" data-target="#modal-delete-{{$pro->idproducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>
        <!-- Modal edit-->
                        <div class="modal fade" id="EditModal{{$nx}}" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color:#F3EA5D">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title" style="text-align: center">Editar Producto</h3>
                              </div>
                              <div class="modal-body">
                                {!!Form::open(['method'=>'PATCH','action'=>['ProductoController@update', $pro->idproducto],'autocomplete'=>'off'])!!}
                                <input type="hidden" name="type" value="2" class="form-control">
                                <div class="row">
                                  <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                      <label for="codebar">Codebar: </label>
                                      <input type="text" name="codebar" required value="{{$pro->codebar}}" class="form-control">          
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                      <label for="producto" class="control-label">Producto</label>
                                      <input type="text" name="producto" value="{{$pro->producto}}" class="form-control">
                                    </div>
                                  </div>                             
                                  <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                      <label for="talle">Talle</label>
                                      <input type="text" name="talle" value="{{$pro->talle}}" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                      <label for="style">Style</label>
                                      <input type="text" name="style" value="{{$pro->style}}" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                      <label for="imagen">Imagen</label>
                                      <input type="text" name="imagen" value="{{$pro->imagen}}" class="form-control">
                                    </div>
                                  </div>                          
                                </div>
                                 </div>
                               <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              </div>
                                {!!Form::close()!!}
                              
                                     
                            </div>
                          </div>
                        </div>
                        

        @include('stock.producto.modal')
        @endforeach
       
      </table>

                  <div class="modal fade" id="crpModal" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            </div>
                          </div>
                  </div>   
      
    </div>   
  </div>
</div>
 {{$productos->render()}}

@endsection
