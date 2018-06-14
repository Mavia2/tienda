<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comparar;
use Illuminate\Support\Facades\Redirect;
use DB;
use Goutte;
use Goutte\Client;

class CompararController extends Controller
{
   public function __construct()
   	{
   	}

    

   public function index(Request $request)
   	{
      $album=$request->get('filtro');
      if(!$album){
        $album="cbeba";
      } 
      
      $nini= Comparar::dataFaceComparar("nini",$album);
      $moda= Comparar::dataFaceComparar("moda",$album);           
      
      $filtro=["cbeba"=>"Carter´s Bebas","cbebe"=>"Carter´s Bebes", 'cnena'=>"Carter´s Nenas", 'cnene'=>"Carter´s Nenes", 'hnena'=>"HyM Nenas y bebas", 'hnene'=>"HyM Nenes y bebes", 'skip'=>"Skip-Hop", 'osh'=>"Oshkosh Moda" ];
  
    
     return view('buscar.comparar.index',["nini"=>$nini, "moda"=>$moda, "filtro"=>$filtro, "album"=>$album]);        
  	}

 
  	public function create()
	{
    	
	}

	public function store (Request $request)
	{
    	
	}
	public function show($id)
	{
      
     
	}
	public function edit($id)
	{
    	
	}
	public function update(Request $request,$id)
	{
    	
	}
	public function destroy($id)
	{
    	
	}
}
