<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use File;

class BuscarController extends Controller
{
   public function __construct()
   	{
   	}
   public function index(Request $request)
   	{
      $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');       
      foreach ($carnena as $key ) {
        $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      }

      $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');   
      foreach ($carbeba as $key ) {
        $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      }

      $col = Collection::make($var);
      
      $query=trim($request->get('searchText')); 
      $col2=$col 
      ->where('cod',$query)     
      ->first();
     
      return view('buscar.index',["col2"=>$col2,"searchText"=>$query]);
     

        
  	 }
  	public function create()
	{
    	
	}

	public function store (PersonaFormRequest $request)
	{
    	
	}
	public function show($id)
	{
      
     
	}
	public function edit($id)
	{
    	
	}
	public function update(PersonaFormRequest $request,$id)
	{
    	
	}
	public function destroy($id)
	{
    	
	}
}
