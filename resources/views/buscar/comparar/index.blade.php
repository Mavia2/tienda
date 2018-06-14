@extends ('layouts.admin')
@section ('titulo') @include('buscar.comparar.search')
@endsection
@section ('contenido')
@push ('script')


<script>

$(document).ready(function() {
  $('#ex').DataTable( {
        "paging":   false,
        "order": [[ 0, "desc" ]],
        

dom: 'Bfrtip',
fixedHeader: false,

"columnDefs": [             
             {
                "targets": [ 0 ],
                "visible": true,
                "searchable": true
            },
            {
                "targets": [ 1 ],
                "visible": true,
                "searchable": false
            },
              {
                "targets": [ 2 ],
                "visible": true,
                "searchable": true
            },
              
            {
                "targets": [ 3 ],
                "visible": true,
                "searchable": false
            }
        ],

 
language: {
        search: "Buscar :"
    },
 buttons: [
            
        ],
       
     
    } );
   $('#exx').DataTable( {
        "paging":   false,
        "order": [[ 0, "desc" ]],
        

dom: 'Bfrtip',
fixedHeader: false,

"columnDefs": [             
             {
                "targets": [ 0 ],
                "visible": true,
                "searchable": true
            },
            {
                "targets": [ 1 ],
                "visible": true,
                "searchable": false
            },
              {
                "targets": [ 2 ],
                "visible": true,
                "searchable": true
            },
              
            {
                "targets": [ 3 ],
                "visible": true,
                "searchable": false
            }
        ],

 
language: {
        search: "Buscar :"
    },
 buttons: [
            
        ],
       
     
    } );
} );



</script>
@endpush
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">    
    
        
      
      </div>
  
  </div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover" id="ex">
        <thead style="background-color: #1f6b48c9;">
          <th>Pagina</th>
          <th>Album</th> 
          <th>Descripcion</th>         
          <th>Imagen</th>         
        </thead>
        @php $n=0;@endphp
        @foreach ($nini as $sto)
       
        <tr>
          <td>Nini</td>         
          <td>{{$album}}</td>
          <td><textarea class="form-control " readonly cols ="6" rows="7" style="width: 100%;">{{$sto['name']}}</textarea></td>          
          <td style="text-align: center"><img src="{{$sto['img']}}" width="130px" data-toggle="modal" data-target="#myModall{{$n}}" class="img-thumbnail">
                        <!-- Modal -->
                        <div class="modal fade" id="myModall{{$n}}" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align: center">Mmm</h4>
                              </div>
                              <div class="modal-body">
                                <img src="{{$sto['img']}}" style="margin: auto; width:100%">
                              </div>        
                            </div>
                          </div>
                        </div>
                        @php $n++; @endphp</td>          
          @endforeach
      </table>
    </div>
   
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover" id="exx">
        <thead style="background-color: #bef1e091;">
          <th>Pagina</th>
          <th>Album</th> 
          <th>Descripcion</th>         
          <th>Imagen</th>         
        </thead>
        @php $n=0;@endphp
        @foreach ($moda as $sto)
        
        <tr>
          <td>Moda</td>         
          <td>{{$album}}</td>
          <td><textarea class="form-control " readonly cols ="6" rows="7" style="width: 100%;">{{$sto['name']}}</textarea></td>         
          <td style="text-align: center"><img src="{{$sto['img']}}" width="130px" data-toggle="modal" data-target="#myModal{{$n}}" class="img-thumbnail">
                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{$n}}" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align: center">Mmmmm</h4>
                              </div>
                              <div class="modal-body">
                                <img src="{{$sto['img']}}" style="margin: auto; width:100%">
                              </div>        
                            </div>
                          </div>
                        </div>
                        @php $n++; @endphp</td>          
          @endforeach
      </table>
    </div>
   
  </div>
</div>


@endsection
