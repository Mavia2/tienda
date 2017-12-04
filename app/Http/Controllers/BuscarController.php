<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buscar;
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
        $alb="1474268852893493"; 
        foreach ($carbeba as $key ) {
          $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
        }      
      }
      elseif ($radio=='cbebe') {
        $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
        $alb="1473359842984394";       
        foreach ($carbebe as $key ) {
        $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='cnena') {
        $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
        $alb="1476399469347098";       
          foreach ($carnena as $key ) {
          $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
        }
      }
      elseif ($radio=='cnene') {
        $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
        $alb="1475944139392631";       
        foreach ($carnene as $key ) {
        $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='hnena') {
        $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
        $alb="1472453289741716";       
        foreach ($hymnena as $key ) {
        $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='hnene') {
        $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
        $alb="1472916719695373";       
        foreach ($hymnene as $key ) {
        $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      elseif ($radio=='skip') {
        $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
        $alb="1837283549925353";       
        foreach ($skip as $key ) {
        $var[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
        }
      }
      else{
        $var=0;
         $alb="1474268852893493"; 
      }
      $col = Collection::make($var);      
      $query=trim($request->get('searchText')); 
      $query2=$request->get('searchText2'); 
      $col2=$col 
      ->where('cod',$query)     
      ->first();
      $face=[];
      if ($request->get('searchText2')){
        $face=Buscar::dataface($alb, $query2);
      }
      
      #if ($request->get('searchText2')){
       
      #$apialbum="https://graph.facebook.com/v2.11/$alb?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=photos{name,picture,link}";

      #$tools = json_decode(file_get_contents($apialbum));
     
     
      #foreach ($tools->photos->data as $key ) {        
      #  if (substr($key->name,0,5) == $query2) {         
      #     $face[]=['pic'=>$key->picture, 'lin'=>$key->link, 'code'=>substr($key->name,0,5)];
      #  }       
      #}
      
      #if($tools->photos->paging->next && !$face){
      #   $apialbum=$tools->photos->paging->next;
      #   $apialbum=str_replace ("limit=25","limit=100",$apialbum);
      #   $tools = json_decode(file_get_contents($apialbum));
      #   foreach ($tools->data as $key ) {        
      #      if (substr($key->name,0,5) == $query2) {             
      #         $face[]=['pic'=>$key->picture, 'lin'=>$key->link, 'code'=>substr($key->name,0,5)];
      #      }        
      #    }        
      #   if($tools->paging->next && !$face){
      #    $apialbum=$tools->paging->next;
      #    $apialbum=str_replace ("limit=25","limit=100",$apialbum);
      #    $tools = json_decode(file_get_contents($apialbum));
      #     foreach ($tools->data as $key ) {          
      #          if (substr($key->name,0,5) == $query2) {
      #             $face[]=['pic'=>$key->picture, 'lin'=>$key->link, 'code'=>substr($key->name,0,5)];
      #          }          
      #      }
      #      if($tools->paging->next && !$face){
      #        $apialbum=$tools->paging->next;
      #        $apialbum=str_replace ("limit=25","limit=100",$apialbum);
      #        $tools = json_decode(file_get_contents($apialbum));
      #         foreach ($tools->data as $key ) {          
      #              if (substr($key->name,0,5) == $request->get('searchText2')) {                      
      #                 $face[]=['pic'=>$key->picture, 'lin'=>$key->link, 'code'=>substr($key->name,0,5)];
      #              }             
      #          }
      #          if($tools->paging->next && !$face){
      #              $apialbum=$tools->paging->next;
       #             $apialbum=str_replace ("limit=25","limit=100",$apialbum);
       #             $tools = json_decode(file_get_contents($apialbum));
       #              foreach ($tools->data as $key ) {          
       #                   if (substr($key->name,0,5) == $request->get('searchText2')) {                            
       #                      $face[]=['pic'=>$key->picture, 'lin'=>$key->link, 'code'=>substr($key->name,0,5)];
       #                   }
       #               }
       #               if($tools->paging->next && !$face){
       #               $apialbum=$tools->paging->next;
       #               $apialbum=str_replace ("limit=25","limit=100",$apialbum);
       #               $tools = json_decode(file_get_contents($apialbum));
       #                foreach ($tools->data as $key ) {          
       #                     if (substr($key->name,0,5) == $request->get('searchText2')) {                             
       #                        $face[]=['pic'=>$key->picture, 'lin'=>$key->link, 'code'=>substr($key->name,0,5)];
       #                     }
       #                 }
       #               }  
       #         }
       #     }
       #   }          
      #}
     $face=Collection::make($face); 

     #}
      return view('buscar.index',["col2"=>$col2,"searchText"=>$query,"searchText2"=>$query2,"radio"=>$radio, "face"=>$face]);
     

        
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
