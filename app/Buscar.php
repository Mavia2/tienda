<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\File;
use Storage;
use Goutte\Client;




class Buscar extends Model
{
  protected $table= 'facebook';

  protected $primaryKey= 'id';

  public $timestramp= true;


  protected $fillable = [
      'code',
      'idfacebook',
      'album',
      'foto',
      'link',      
      'style',
      'name',
      'idalbum',     
      'updated_at',
  ];
     
  public static function dispHym($col2){
        $html2 =$col2->style;        
        $html ="http://www2.hm.com/en_us/productpage.$html2.html";         
        $client = new Client();
        $crawler = $client->request('GET', $html);
        if ($crawler->filterXPath('//button[@class="item button fluid button-big button-buy js-open-size-selector button-disabled"]')->count()>0){
          $disp="No hay Disponibilidad";
        }        
        else{          
          $as5=$crawler->filterXPath('//li[@class="width5"]')
                      ->extract(('_text'));                      
          $as5= preg_replace("/(\n|\t)/", '', $as5); 
              
          $as4=$crawler->filterXPath('//li[@class="width4"]')
                      ->extract(('_text'));                      
          $as4= preg_replace("/(\n|\t)/", '', $as4);
          $as1=$crawler->filterXPath('//li[@class="width1"]')
                      ->extract(('_text'));                      
          $as1= preg_replace("/(\n|\t)/", '', $as1);
          $as2=$crawler->filterXPath('//li[@class="width2"]')
                      ->extract(('_text'));                      
          $as2= preg_replace("/(\n|\t)/", '', $as2);
          $as3=$crawler->filterXPath('//li[@class="width3"]')
                      ->extract(('_text'));                      
          $as3= preg_replace("/(\n|\t)/", '', $as3);         
          $disp="";          
           foreach ($as1 as $key => $value) {           
            $disp="$disp $value";            
          }
          foreach ($as2 as $key => $value) {           
            $disp="$disp $value";            
          }
          foreach ($as3 as $key => $value) {           
            $disp="$disp $value";            
          }
          foreach ($as4 as $key => $value) {           
            $disp="$disp $value";            
          }
          foreach ($as5 as $key => $value) {           
            $disp="$disp $value";            
          } 
          $disp=mb_substr($disp,6);
          $disp=str_replace(' ', '', $disp);

          return ($disp); 
        }
      }

  public static function nameFace($idface){
    $apialbum="https://graph.facebook.com/v2.11/$idface?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=name";
    $tools = json_decode(file_get_contents($apialbum));
    $data = $tools->name;           
    return ($data);      
    }

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
         $face[]=['name'=>$value->name,'pic'=>$value->picture, 'lin'=>$value->link, 'code'=>substr($value->name,0,5)];
      }
    }    

    return ($face);      
    }

    public static function datafaceidalbum($album){
    $apialbum="https://graph.facebook.com/v2.11/$album?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&fields=photos{name,picture,link,id,images}";
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
       $face[]=['pic'=>$value->picture, 'lin'=>$value->link, 'name'=>$value->name ,'code'=>substr($value->name,0,5), 'idfacebook'=>$value->id, 'images'=>$value->images[0]->source];
       
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
