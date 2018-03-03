<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\File;
use Storage;




class Buscar extends Model
{
     
  public static function dataface($album, $busca){
    $apialbum="https://graph.facebook.com/v2.11/$album?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=photos{name,picture,link}";
    $tools = json_decode(file_get_contents($apialbum));    
    $data = $tools->photos->data;     
    $next = $tools->photos->paging->next;
    $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$next))); 
    $data=array_merge($data,$tools1->data);  
   
    while (isset($tools1->paging->next)) {
       $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$tools1->paging->next))); 
       $data=array_merge($data,$tools1->data); 
    };
     $face=[];

    foreach ($data as $key => $value) {
      if (substr($value->name,0,5)==$busca){
         $face[]=['pic'=>$value->picture, 'lin'=>$value->link, 'code'=>substr($value->name,0,5)];
      }
    }    

    return ($face);      
    }

    public static function datafaceidalbum($album){
    $apialbum="https://graph.facebook.com/v2.11/$album?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=photos{name,picture,link}";
    $tools = json_decode(file_get_contents($apialbum));    
    $data = $tools->photos->data;     
    $next = $tools->photos->paging->next;
    $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$next))); 
    $data=array_merge($data,$tools1->data);  
   
    while (isset($tools1->paging->next)) {
       $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$tools1->paging->next))); 
       $data=array_merge($data,$tools1->data); 
    };
     $face=[];

    foreach ($data as $key => $value) {
       $face[]=['pic'=>$value->picture, 'lin'=>$value->link, 'code'=>substr($value->name,0,5)];
      }
        

    return ($face);      
    }

    public static function imgface($album){
      if($album=="cbeba"){
        $alb="1474268852893493";
      }
      elseif ($album=="cbebe") {
       $alb="1473359842984394";   
      }
      elseif ($album=="cnena") {
      $alb="1476399469347098";   
      }
      elseif ($album=="cnene") {
        $alb="1475944139392631";  
      }
      elseif ($album=="hnena") {
         $alb="1472453289741716";   
      }
      elseif ($album=="hnene") {
        $alb="1472916719695373";  
      }
      elseif ($album=="skip") {
        $alb="1837283549925353"; 
      }
      else{
         $alb="1474268852893493";
      }
      $apialbum="https://graph.facebook.com/v2.11/$alb?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=photos{name,picture,link}";
    $tools = json_decode(file_get_contents($apialbum));    
    $data = $tools->photos->data;     
    $next = $tools->photos->paging->next;
    $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$next))); 
    $data=array_merge($data,$tools1->data);  
   
    while (isset($tools1->paging->next)) {
       $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$tools1->paging->next))); 
       $data=array_merge($data,$tools1->data); 
    };   
   
    #foreach ($data as $key ) {
    #  $file=file_get_contents($key->picture);
    #  $save=file_put_contents("images/deep/1.jpg", $file);     
    #  Storage::delete("images/deep/1.jpg");
      


    
    

    return response()->json($data);    
    }

  public static function fechain($fechain){
    $fecha="";
    $carbon = new \Carbon\Carbon();
    if(!empty($fechain)){
        $fecha=$carbon->createFromFormat('Y-m-d',$fechain);
        $fecha=$fecha->format('d/m/Y');
     }             
                 
    return ($fecha);      
    }

  

}
