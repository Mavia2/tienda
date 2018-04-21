<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Scrap;
use App\Formavieja;
use Illuminate\Support\Facades\Redirect;
use DB;
use Goutte;
use File;

class FormaviejaController extends Controller
{
   public function __construct()
   	{
   	}
   public function index(Request $request)
   	{
     
      $radio=$request->get('filtroAlbum');
      if ($radio=='cbeba' || !$request->get('filtroAlbum')){           
        $albIdFacebook="1474268852893493"; 
        $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
      }
      elseif ($radio=='cbebe') {      
        $albIdFacebook="1473359842984394"; 
        $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
      }
      elseif ($radio=='cnena') {        
        $albIdFacebook="1476399469347098"; 
         $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
      }
      elseif ($radio=='cnene') {
        $albIdFacebook="1475944139392631";
        $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');  
      }
      elseif ($radio=='hnena') {       
         $albIdFacebook="1472453289741716";
         $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
      }
      elseif ($radio=='hnene') {        
         $albIdFacebook="1472916719695373"; 
          $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
      }
      elseif ($radio=='skip') {        
         $albIdFacebook="1837283549925353";
         $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop'); 
      }

      $face=Formavieja::datafaceidalbum($albIdFacebook);      
      $listaFacebook=Collection::make($face);      
      if($radio=='hnene'|| $radio=='hnena'){
        foreach ($archivos as $key ) {            
            $cod=strstr(substr($key,55),'-',True);
            $style=substr(strstr($key,'-'), 1, -4);
            $resultado=$listaFacebook
              ->where('code',$cod);  
            $idcoll=$resultado->keys()->first();             
            $as=$listaFacebook[$idcoll];
            $as["style"]=$style;
            $listaFacebook[$idcoll]=$as;
        }     
      }
      elseif($radio=='skip'){
        foreach ($archivos as $key ) {            
            $cod=strstr(substr($key,54),'-',True);
            $style=substr(strstr($key,'-'), 1, -4);
            $resultado=$listaFacebook
              ->where('code',$cod);  
            $idcoll=$resultado->keys()->first();             
            $as=$listaFacebook[$idcoll];
            $as["style"]=$style;
            $listaFacebook[$idcoll]=$as;
        }     
      }
      else{
        foreach ($archivos as $key ) {            
            $cod=strstr(substr($key,59),'-',True);
            $style=substr(strstr($key,'-'), 1, -4);
            $resultado=$listaFacebook
              ->where('code',$cod);  
            $idcoll=$resultado->keys()->first();             
            $as=$listaFacebook[$idcoll];
            $as["style"]=$style;
            $listaFacebook[$idcoll]=$as;
        }     
      }



      $listaMysql=DB::table('facebook')
        ->where ('idalbum', $albIdFacebook)
        ->get();

      $filtroAlbum=[
        "cbeba"=>"Carter´s Bebas",
        "cbebe"=>"Carter´s Bebes",
        "cnena"=>"Carter´s Nenas",
        "cnene"=>"Carter´s Nenes",
        "hnena"=>"HyM Bebas y Nenas",
        "hnene"=>"HyM Bebes y Nenes",
        "skip"=>"Skip-Hop"
      ];
       

      
      return view('sync\formavieja.index',["filtroAlbum"=>$filtroAlbum, "listaMysql"=>$listaMysql, "radio"=>$radio, "listaFacebook"=>$listaFacebook]);
     

        
  	 }

  public function buscar(Request $request)
  {
      $data=Buscar::imgface($request->get('album'));
      

      return ($data);   
  }
  	public function create()
	{


	}

	public function store (Request $request)
	{
    	 
      $radio=$request->get('filtroAlbum');
     
      if ($radio=='cbeba' || !$request->get('filtroAlbum')){           
        $albIdFacebook="1474268852893493"; 
        $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
        $nu="59";
      }
      elseif ($radio=='cbebe') {      
        $albIdFacebook="1473359842984394"; 
        $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
        $nu="59";
      }
      elseif ($radio=='cnena') {        
        $albIdFacebook="1476399469347098"; 
         $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
         $nu="59";
      }
      elseif ($radio=='cnene') {
        $albIdFacebook="1475944139392631";
        $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
        $nu="59";  
      }
      elseif ($radio=='hnena') {       
         $albIdFacebook="1472453289741716";
         $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
         $nu="55";
      }
      elseif ($radio=='hnene') {        
         $albIdFacebook="1472916719695373"; 
          $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
          $nu="55";
      }
      elseif ($radio=='skip') {        
         $albIdFacebook="1837283549925353";
         $archivos=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop'); 
         $nu="54";
      }

      $face=Formavieja::datafaceidalbum($albIdFacebook);      
      $listaFacebook=Collection::make($face); 


      foreach ($archivos as $key ) {            
            $cod=strstr(substr($key,$nu),'-',True);
            $style=substr(strstr($key,'-'), 1, -4);
            $resultado=$listaFacebook
              ->where('code',$cod);  
            $idcoll=$resultado->keys()->first();             
            $as=$listaFacebook[$idcoll];
            $as["style"]=$style;
            $listaFacebook[$idcoll]=$as;
        }     
        $cont=0;
      foreach ($listaFacebook as $key ) {          
          if(Formavieja::buscarIdFacebook($key["idfacebook"])->isEmpty()){
            if (array_key_exists('style',$key)) {
              $st=$key['style'];
            }
            else{
              $st=" ";
            }           
            $face=new Formavieja;
            $face->idfacebook=$key["idfacebook"];
            $face->idalbum=$albIdFacebook;
            $face->code=$key["code"];
            $face->album=$radio;
            $face->foto=$key["img"];
            $face->link=$key["link"];
            $face->style=$st;
            $face->name=$key["name"];            
            $face->save();
            $cont=$cont+1;
            
          }
          else{
            $idd=Formavieja::buscarIdFacebook($key["idfacebook"]);
            $idd=$idd[0]->id;
            $face=Formavieja::findOrFail($idd);           
            $face->pic=$key["pic"];
            $face->update();
          }
      } 
      return Redirect::to('formavieja');
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
