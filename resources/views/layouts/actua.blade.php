<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Scan Codebar</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">

              <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:0px">
              <thead style="background-color:#A9D0F5">
                
                <th>Codebar</th>
                <th style="text-align: center">Imagen</th>
                <th>Producto</th>
                <th style="text-align: center">Talle</th>
                                
                <th>Orden</th>
                <th style="text-align: center">Cantidad</th>
                <th>Tipo</th>
                <th style="text-align: center">Check</th>
                             
              </thead>
              
              <tbody>

                
              @php $w=$ultimo; @endphp
                
                <tr>
                  <td>{{$w->codebar}}</td>
                  <td style="text-align: center"><img src="{{$w->imagen}}" width="30px" data-toggle="modal" data-target="#myModalF" class="img-thumbnail">
                        <!-- Modal -->
                        <div class="modal fade" id="myModalF" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align: center">{{$w->producto}}</h4>
                              </div>
                              <div class="modal-body">
                                <img src="{{str_replace("?sw=83", "?sw=250",$w->imagen)}}" style="margin: auto">
                              </div>        
                            </div>
                          </div>
                        </div>
                        
                  </td>
                  <td>{{$w->producto}}</td>
                  <td style="text-align: center">{{$w->talle}}</td>
                
                                  
                  <td>{{$w->orden}}</td>
                  <td style="text-align: center">{{$w->cant}}</td>  
                  <td>{{$w->tipo}}</td>                  
                  <td style="text-align: center"><mark>{{$w->chequeado}}</mark></td>
                  
                   
                </tr>
               
              </tbody>
            </table>

             </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->