<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Storage;

class Comparar extends Model
{
  private static function dataFaceBuscaAlbum($idalbum){
    $apialbum="https://graph.facebook.com/v2.11/$idalbum?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=photos{name,picture,link,images}";
    $tools = json_decode(file_get_contents($apialbum));   
    $data = $tools->photos->data;       
    $next = $tools->photos->paging->next;
    $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$next))); 
    $data=array_merge($data,$tools1->data); 
 
    while (isset($tools1->paging->next)) {
       $tools1 = json_decode(file_get_contents(str_replace ("limit=25","limit=100",$tools1->paging->next))); 
       $data=array_merge($data,$tools1->data); 
    };
    
    $face="";   
    
    foreach ($data as $key => $value) {        
        if(!isset($value->name)){
          $nam="";
        }
        else{
          $nam=$value->name;
        }        
       
        $face[]= ['name'=>$nam,'pic'=>$value->picture, 'lin'=>$value->link, 'img'=>$value->images[0]->source];
    }
   
    $face=collect($face);        
    
   
    return ($face);
  }
     
  public static function dataFaceComparar($comparar, $album ){
    if($comparar=="nini"){
      if($album=="cbeba"){
        $idalbum="1806581016051390";
      }
      elseif ($album=="cbebe") {
        $idalbum="1806776869365138";
      }
      elseif ($album=="cnena") {
        $idalbum="1813577755351716";
      }
      elseif ($album=="cnene") {
        $idalbum="1813529308689894";
      }
      elseif ($album=="hnena") {
        $idalbum="1097370906972408";
      }
      elseif ($album=="hnene") {
        $idalbum="1097413210301511";
      }
      elseif ($album=="skip") {
        $idalbum="801069176602584";
      }
      
      if ($album=="osh") {
        $face=[];
      }
      else{
      $face=static::dataFaceBuscaAlbum($idalbum);    
      }

      return ($face);
    }#fin del if
    
    else{
      if($album=="cbeba"){
        $idalbum="1095284717218837";
      }
      elseif ($album=="cbebe") {
        $idalbum="1094826427264666";
      }
      elseif ($album=="cnena") {
        $idalbum="1093496650730977";
      }
      elseif ($album=="cnene") {
        $idalbum="1094126107334698";
      }
      elseif ($album=="hnena") {
        $idalbum="1254097911337516";
      }
      elseif ($album=="hnene") {
        $idalbum="1096661787081130";
      }
      elseif ($album=="skip") {
        $idalbum="1455297381217567";
      }
      elseif ($album=="osh") {
        $idalbum="1095536650526977";
      }

      $face=static::dataFaceBuscaAlbum($idalbum);    

      return ($face);
    }#fin del else       
  }
}