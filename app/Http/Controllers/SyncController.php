<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buscar;
use Illuminate\Support\Facades\Redirect;
use DB;
use File;

class SyncController extends Controller
{
   public function __construct()
   	{
   	}
   public function index(Request $request)
   	{
            
      $radio=$request->get('radio');
      $borr=[];
      if ($radio=='auto' || !$request->get('radio')) {
         $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
         $alb="1474268852893493"; 
         $albu="Carters Beba";
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);        
        foreach ($carbeba as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27) ,'alb'=>$albu];
              }           
         }
         
         $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
         $alb="1473359842984394"; 
          $albu="Carters Bebe"; 
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carbebe as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }

         $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
         $alb="1476399469347098";  
          $albu="Carters Nena";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carnena as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }

         $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
         $alb="1475944139392631"; 
         $albu="Carters Nene";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carnene as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }  

         $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
         $alb="1472453289741716";
         $albu="Hym Nena";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($hymnena as $key ) {
          $cod=strstr(substr($key,55),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }

         $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
         $alb="1472916719695373";  
         $albu="Hym Nene";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($hymnene as $key ) {
          $cod=strstr(substr($key,55),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         } 

         $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
         $alb="1837283549925353"; 
         $albu="Skip Hop";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($skip as $key ) {
          $cod=strstr(substr($key,54),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }  





      }
      
      elseif ($radio=='cbeba'){       
         $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
         $alb="1474268852893493"; 
         $albu="Carters Beba";
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);        
        foreach ($carbeba as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27) ,'alb'=>$albu];
              }           
         }
       }
      elseif ($radio=='cbebe') {        
        $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
         $alb="1473359842984394"; 
          $albu="Carters Bebe"; 
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carbebe as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }        
      }
      elseif ($radio=='cnena') {
        $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
         $alb="1476399469347098";  
          $albu="Carters Nena";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carnena as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }       
      }
      elseif ($radio=='cnene') {
         $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
         $alb="1475944139392631"; 
         $albu="Carters Nene";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carnene as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }  
      }
      elseif ($radio=='hnena') {
        $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
         $alb="1472453289741716";
         $albu="Hym Nena";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($hymnena as $key ) {
          $cod=strstr(substr($key,55),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }
      }
      elseif ($radio=='hnene') {
        $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
         $alb="1472916719695373";  
         $albu="Hym Nene";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($hymnene as $key ) {
          $cod=strstr(substr($key,55),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }         
      }
      elseif ($radio=='skip') {
         $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
         $alb="1837283549925353"; 
         $albu="Skip Hop";    
         $face=Buscar::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($skip as $key ) {
          $cod=strstr(substr($key,54),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if (!$col2){
                $borr[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27),'alb'=>$albu];
              }           
         }  
      }
     
      
            
      
      return view('sync.index',["borr"=>$borr, "radio"=>$radio]);
     

        
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
  public function elimi(Request $request)
  {
    $dir="C:/xampp/htdocs/tienda/public";
    $dir1=$request->get("id");
    $dir2="C:/xampp/htdocs/scrap/scrap/public/images";
    $dir3=substr($dir1,17);    
    $img="$dir$dir1";
    $img1="$dir2$dir3";
    $as=File::exists($img); 
    $as1=File::exists($img1); 

    #dd($dir, $dir1, $dir3, $img, $img1,$as, $as1);
    File::delete($img, $img1);    
    
      return Redirect::back();
  }
}
