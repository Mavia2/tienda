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
      $radio=$request->get('radio');
      
      if ($radio=='cbeba'){
        $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');   
        foreach ($carbeba as $key ) {
          $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
        }      
      }
      elseif ($radio=='cbebe') {
        $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');       
        foreach ($carbebe as $key ) {
        $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='cnena') {
        $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');       
          foreach ($carnena as $key ) {
          $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
        }
      }
      elseif ($radio=='cnene') {
        $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');       
        foreach ($carnene as $key ) {
        $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='hnena') {
        $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');       
        foreach ($hymnena as $key ) {
        $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='hnene') {
        $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');       
        foreach ($hymnene as $key ) {
        $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='skip') {
        $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');       
        foreach ($skip as $key ) {
        $var[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      else{
        $var=0;
      }
      $col = Collection::make($var);      
      $query=trim($request->get('searchText')); 
      $col2=$col 
      ->where('cod',$query)     
      ->first();
     
      return view('buscar.index',["col2"=>$col2,"searchText"=>$query,"radio"=>$radio]);
     

        
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
