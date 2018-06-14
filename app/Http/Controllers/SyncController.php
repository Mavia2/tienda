<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buscar;
use Illuminate\Support\Facades\Redirect;
use DB;


class SyncController extends Controller
{
   public function __construct()
   	{
   	}
   public function index(Request $request)
   	{
      $radio=$request->get('radio');
      $borr=[];
      if($radio=="todo"){
        $albdb="cbeba";
        $alb="1474268852893493";
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
       foreach ($face as $key ) {
        $idfacebookFace=$key['idfacebook'];          
        $db1=$db
          ->where('idfacebook',$idfacebookFace)     
          ->first();           
            if (!$db1){
              $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
            }
        $db2=$db
          ->where('idfacebook',$idfacebookFace) 
          ->where('name',"!=", $key['name'])    
          ->first(); 
          if ($db2){              
              $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
          }
        }

        $albdb="cbebe";
        $alb="1473359842984394";
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
        foreach ($face as $key ) {
          $idfacebookFace=$key['idfacebook'];          
          $db1=$db
            ->where('idfacebook',$idfacebookFace)     
            ->first();           
          if (!$db1){
            $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
          }
          $db2=$db
            ->where('idfacebook',$idfacebookFace) 
            ->where('name',"!=", $key['name'])    
            ->first(); 
          if ($db2){              
              $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
          }
        }

        $albdb="cnena";
        $alb="1476399469347098"; 
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
       foreach ($face as $key ) {
          $idfacebookFace=$key['idfacebook'];          
          $db1=$db
            ->where('idfacebook',$idfacebookFace)     
            ->first();           
          if (!$db1){
            $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
          }
          $db2=$db
            ->where('idfacebook',$idfacebookFace) 
            ->where('name',"!=", $key['name'])    
            ->first(); 
          if ($db2){              
              $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
          }
        }

        $albdb="cnene";
        $alb="1475944139392631";  
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
       foreach ($face as $key ) {
        $idfacebookFace=$key['idfacebook'];          
        $db1=$db
          ->where('idfacebook',$idfacebookFace)     
          ->first();           
        if (!$db1){
          $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
        }
        $db2=$db
          ->where('idfacebook',$idfacebookFace) 
          ->where('name',"!=", $key['name'])    
          ->first(); 
        if ($db2){              
            $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
        }
      }

        $albdb="hnena";
        $alb="1472453289741716";  
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
       foreach ($face as $key ) {
        $idfacebookFace=$key['idfacebook'];          
        $db1=$db
          ->where('idfacebook',$idfacebookFace)     
          ->first();           
        if (!$db1){
          $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
        }
        $db2=$db
          ->where('idfacebook',$idfacebookFace) 
          ->where('name',"!=", $key['name'])    
          ->first(); 
        if ($db2){              
            $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
        } 
      }

        $albdb="hnene";
        $alb="1472916719695373";
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
       foreach ($face as $key ) {
        $idfacebookFace=$key['idfacebook'];          
        $db1=$db
          ->where('idfacebook',$idfacebookFace)     
          ->first();           
        if (!$db1){
          $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
        }
        $db2=$db
          ->where('idfacebook',$idfacebookFace) 
          ->where('name',"!=", $key['name'])    
          ->first(); 
        if ($db2){              
            $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
        }
      }

        $albdb="skip";
        $alb="1837283549925353"; 
        $db=DB::table('facebook')
                ->where('album', $albdb)        
                ->get();       
       $face=Buscar::datafaceidalbum($alb);
       $face = Collection::make($face);      
       foreach ($face as $key ) {
        $idfacebookFace=$key['idfacebook'];          
        $db1=$db
          ->where('idfacebook',$idfacebookFace)     
          ->first();           
        if (!$db1){
          $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
        }
        $db2=$db
          ->where('idfacebook',$idfacebookFace) 
          ->where('name',"!=", $key['name'])    
          ->first(); 
        if ($db2){              
            $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$albdb, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
        }
       }
      }
      else{
            if ($radio=='cbeba' || !$request->get('radio')) {
               #$carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
               $radio="cbeba";
               $alb="1474268852893493"; 
            }
            elseif ($radio=='cbebe') {
              $alb="1473359842984394";
            }
            elseif ($radio=='cnena'){
               $alb="1476399469347098"; 
            }
            elseif ($radio=='cnene'){
               $alb="1475944139392631";  
            }
            elseif ($radio=='hnena'){
                $alb="1472453289741716"; 
            }
            elseif ($radio=='hnene'){
               $alb="1472916719695373";   
            }
            else{ 
              $alb="1837283549925353"; 
            }
               $db=DB::table('facebook')
                ->where('album', $radio)        
                ->get(); 
              
               #$albu="Carters Beba";
               $face=Buscar::datafaceidalbum($alb);
               $face = Collection::make($face);  
               #dd($face,$db);         
               
               foreach ($face as $key ) {
                $idfacebookFace=$key['idfacebook'];          
                $db1=$db
                  ->where('idfacebook',$idfacebookFace)     
                  ->first();           
                    if (!$db1){
                      $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$radio, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
                    }
                $db2=$db
                  ->where('idfacebook',$idfacebookFace) 
                  ->where('name',"!=", $key['name'])    
                  ->first(); 
                  if ($db2){
                      #dd($db2,$key['name']);
                      $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$radio, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
                  }                           
               }
      }  
      $filtro=["cbeba"=>"Carter´s Bebas","cbebe"=>"Carter´s Bebes", 'cnena'=>"Carter´s Nenas", 'cnene'=>"Carter´s Nenes", 'hnena'=>"HyM Nenas y bebas", 'hnene'=>"HyM Nenes y bebes", 'skip'=>"Skip-Hop", 'todo'=>"Todos los albumnes" ];    
      return view('sync.index',["borr"=>$borr, "radio"=>$radio, "filtro"=>$filtro]);     
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
  public function elimi(Request $request)
  {
     $todo=Buscar::findOrFail($request->get('id'));  
     $todo->name=str_replace("\r\n","\n",$request->get('nameface')); 
     #dd($todo);
     $todo->save();
     
    
      return Redirect::back();
  }
   public function album(Request $request)
  {
      $radio=$request->get('radio');
      if ($radio=='cbeba') {               
        $alb="1474268852893493"; 
      }
      elseif ($radio=='cbebe') {
        $alb="1473359842984394";
      }
      elseif ($radio=='cnena'){
         $alb="1476399469347098"; 
      }
      elseif ($radio=='cnene'){
         $alb="1475944139392631";  
      }
      elseif ($radio=='hnena'){
          $alb="1472453289741716"; 
      }
      elseif ($radio=='hnene'){
         $alb="1472916719695373";   
      }
      else{ 
        $alb="1837283549925353"; 
      }
      $db=DB::table('facebook')
        ->where('album', $radio)        
        ->get();              
      $face=Buscar::datafaceidalbum($alb);
      $face = Collection::make($face);              
      foreach ($face as $key ) {
        $idfacebookFace=$key['idfacebook'];          
        $db1=$db
          ->where('idfacebook',$idfacebookFace)     
          ->first();           
            if (!$db1){
              $borr[]=['code'=>$key['code'],'style'=>" ",'idfacebook'=>$idfacebookFace ,'alb'=>$radio, 'img'=>$key['images'],'namedb'=>" ", 'nameface'=>$key['name']];
            }
        $db2=$db
          ->where('idfacebook',$idfacebookFace) 
          ->where('name',"!=", $key['name'])    
          ->first(); 
          if ($db2){
              #dd($db2,$key['name']);
              $borr[]=['code'=>$key['code'],'style'=>$db2->style ,'idfacebook'=>$idfacebookFace ,'alb'=>$radio, 'img'=>$key['images'], 'namedb'=>$db2->name, 'nameface'=>$key['name'], 'id'=>$db2->id]; 
          }                           
       }

      if($borr){
        foreach ($borr as $key => $value) {
            
            $todo=Buscar::findOrFail($value['id']);  
            $todo->name=str_replace("\r\n","\n",$value['nameface']); 
            #dd($todo);
            $todo->save();
         }
      } 
    
      return ($radio);
  }
}
