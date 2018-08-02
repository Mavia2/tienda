<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buscar;
use App\Formavieja;
use Illuminate\Support\Facades\Redirect;
use DB;
use File;
use Goutte;
use Goutte\Client;

class BuscarController extends Controller
{
   public function __construct()
   	{
   	}

    private function buscarEnAlbum($album , $code){
    $lista=DB::table('facebook')
      ->where('album', $album)      
      ->where('code', $code)
      ->first();

    return($lista);   
   } 

   public function index(Request $request)
   	{
      #$radio=$request->get('radio');
      #
      #if ($radio=='cbeba'){
      #  $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
      #  $alb="1474268852893493"; 
      #  foreach ($carbeba as $key ) {
      #    $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
      #  }      
      #}
      #elseif ($radio=='cbebe') {
      #  $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
      #  $alb="1473359842984394";       
      #  foreach ($carbebe as $key ) {
      #  $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      #  }
      #}
      #elseif ($radio=='cnena') {
      #  $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
      #  $alb="1476399469347098";       
      #    foreach ($carnena as $key ) {
      #    $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
      #  }
      #}
      #elseif ($radio=='cnene') {
      #  $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
      #  $alb="1475944139392631";       
      #  foreach ($carnene as $key ) {
      #  $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      #  }
      #}
      #elseif ($radio=='hnena') {
      #  $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
      #  $alb="1472453289741716";       
      #  foreach ($hymnena as $key ) {
      #  $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      #  }
      #}
      #elseif ($radio=='hnene') {
      #  $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
      #  $alb="1472916719695373";       
      #  foreach ($hymnene as $key ) {
      #  $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      #  }
      #}
      #elseif ($radio=='skip') {
      #  $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
      #  $alb="1837283549925353";       
      #  foreach ($skip as $key ) {
      #  $var[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      #  }
      #}
      #elseif ($radio=='auto' || !$request->get('radio')) {
      #      if ($request->get('searchText2')){
      #          $idalbum=mb_substr($request->get('searchText2'),0,1); 
      #          }
      #      else{
              $idalbum=mb_substr($request->get('searchText'),0,1); 
       #    # }
            #if ($idalbum=="1"){
            #   $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
            #   $alb="1474268852893493"; 
            #    foreach ($carbeba as $key ) {                
            #      $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
            #    }                    
            #}
            #elseif ($idalbum=="2") {
            #   $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
            #   $alb="1473359842984394";       
            #    foreach ($carbebe as $key ) {
            #      $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
            #    }
            #}
            #elseif ($idalbum=="3") {
            #    $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
            #    $alb="1476399469347098";       
            #    foreach ($carnena as $key ) {
            #      $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
            #    }
            #}
            #elseif ($idalbum=="4") {
            #   $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
            #   $alb="1475944139392631";       
            #      foreach ($carnene as $key ) {
            #      $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
            #      }
            #}
            #elseif ($idalbum=="5") {
            #  $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
            #  $alb="1472453289741716";       
            #  foreach ($hymnena as $key ) {
            #  $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
            #  }
            #}
            #elseif ($idalbum=="6") {
            #  $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
            #  $alb="1472916719695373";       
            #    foreach ($hymnene as $key ) {
            #    $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
            #    }
            #}
            #elseif ($idalbum=="7") {
            #   $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
            #  $alb="1837283549925353";       
            #  foreach ($skip as $key ) {
            #  $var[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
            #  }
            #}
            #else{
            #  $var=0;
            #  $alb="1474268852893493";  
            #}      
      #}#
      #else{
      #      if ($request->get('searchText2')){
      #      $idalbum=mb_substr($request->get('searchText2'),0,1); 
      #      }
      #      else{
      #        $idalbum=mb_substr($request->get('searchText'),0,1); 
      #      }
      #      if ($idalbum=="1"){
      #         $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
      #         $alb="1474268852893493"; 
      #          foreach ($carbeba as $key ) {
      #            $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
      #          }     
      #      }
      #      elseif ($idalbum=="2") {
      #         $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
      #         $alb="1473359842984394";       
      #          foreach ($carbebe as $key ) {
      #            $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      ##          }
      ##      }
      ##      elseif ($idalbum=="3") {
      ##          $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
      ##          $alb="1476399469347098";       
      ##          foreach ($carnena as $key ) {
      ##            $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];
      ##          }
      ##      }
      ##      elseif ($idalbum=="4") {
      ##         $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
      ##         $alb="1475944139392631";       
      ##            foreach ($carnene as $key ) {
      ##            $var[]=['cod'=>strstr(substr($key,59),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      ##            }
      ##      }
      ##      elseif ($idalbum=="5") {
      ##        $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
      ##        $alb="1472453289741716";       
      ##        foreach ($hymnena as $key ) {
      ##        $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
      ##        }
       #     }
       #     elseif ($idalbum=="6") {
       #       $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
       #       $alb="1472916719695373";       
       #         foreach ($hymnene as $key ) {
       #         $var[]=['cod'=>strstr(substr($key,55),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
       #         }
       #     }
       #     elseif ($idalbum=="7") {
       #        $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
       #       $alb="1837283549925353";       
       #       foreach ($skip as $key ) {
       #       $var[]=['cod'=>strstr(substr($key,54),'-',True),'codcar'=>substr(strstr($key,'-'),1,-4),'url'=>substr($key,27)];  
       #       }
       #     }
       #     else{
       #       $var=0;
       #       $alb="1474268852893493";  
       #     } 
      #}
      #$col = Collection::make($var);            
      $query=trim($request->get('searchText')); 
      if ($idalbum=="1"){         
         $col2=$this->buscarEnAlbum("cbeba",$query);
         $alb="1474268852893493";           
      }
      elseif ($idalbum=="2") {
         $col2=$this->buscarEnAlbum("cbebe",$query);
         $alb="1473359842984394";
      }
      elseif ($idalbum=="3") {
          $col2=$this->buscarEnAlbum("cnena",$query);
          $alb="1476399469347098"; 
      }
      elseif ($idalbum=="4") {
         $col2=$this->buscarEnAlbum("cnene",$query);
         $alb="1475944139392631";    
      }
      elseif ($idalbum=="5") {
        $col2=$this->buscarEnAlbum("hnena",$query);
        $alb="1472453289741716";
      }
      elseif ($idalbum=="6") {
         $col2=$this->buscarEnAlbum("hnene",$query);
         $alb="1472916719695373";  
      }
      elseif ($idalbum=="7") {
          $col2=$this->buscarEnAlbum("skip",$query);
          $alb="1837283549925353";   
      }
      else{
        $col2=$this->buscarEnAlbum("cbeba", $query);
        $alb="1474268852893493";   
      }                
      #$query2=$request->get('searchText2'); 
      #$col2=$col 
      #->where('cod',$query)     
      #->first();
      


      if($idalbum=="5" || $idalbum=="6"){
        if ($col2 === NULL){
          $col2=new Buscar;
          $col2->code="No existe Producto con el Codigo $query en el Album";
          $col2->foto="http://tienda.ar/img/1.png";          
        }
        $disp=Buscar::dispHym($col2);            
           
      }    
      elseif($idalbum =="7"){
        $html0 = "http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=";
        if ($col2 === NULL){
          $col2=new Buscar;
          $col2->code="No existe Producto con el Codigo $query en el Album";
          $col2->foto="http://tienda.ar/img/1.png";
        }        
        $html1 = $col2->style;        
        $html = "$html0$html1";
        
        #$crawler = Goutte::request('GET', $html);
        $client = new Client();
        $crawler = $client->request('GET', $html);
        if ($crawler->filterXPath('//div[@id="primary-nohits"]')->count()>0){
          $disp="No hay Disponibilidad";
        }
        elseif ($crawler->filterXPath('//div[@id="primaryImage"]')->count()>0) {          
          $disp="El producto esta disponible";                 
        }
        elseif ($crawler->filterXPath('//div[@class="search-result-items tiles-container"]')->count()>0) {          
          $disp="El producto esta disponible"; 
        }

        
        else{ 
          $disp="";
        }

      } 
      else{      
        $html0 = "http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=";
        if ($col2 === NULL){
          $col2=new Buscar;
          $col2->code="No existe Producto con el Codigo $query en el Album";
          $col2->foto="http://tienda.ar/img/1.png";
        }        
        $html1 = $col2->style;        
        $html = "$html0$html1";
        
        #$crawler = Goutte::request('GET', $html);
        $client = new Client();
        $crawler = $client->request('GET', $html);
        if ($crawler->filterXPath('//div[@id="primary-nohits"]')->count()>0){
          $disp="No hay Disponibilidad";
        }
        elseif ($crawler->filterXPath('//div[@id="primary"]')->count()>0) {
          
          if($crawler->filterXPath('//div[@class="desktopvisible plp-header"]')->count()>0){
            $disp="Ver Web";
          }
          else{
            $as=$crawler->filterXPath('//ul[@class="swatches size"]')->children()
                        ->extract(('_text'));
            $as= preg_replace("/(\n|\t)/", '', $as);
            $disp="";
            foreach ($as as $key => $value) {           
              $disp="$disp $value";            
            }
          }          
        }
        else{ 
          $disp="";
        }
      }

     
      $face=Buscar::dataface($alb, $query);   
      #if ($request->get('searchText2')){
        #$face=Buscar::dataface($alb, $query2);
      #}
      
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
     #dd($face->get("0")["lin"]);
      return view('buscar.index',["col2"=>$col2,"searchText"=>$query, "face"=>$face, "disp"=>$disp]);
     

        
  	 }

  public function buscar(Request $request)
  {
      $data=Buscar::imgface($request->get('album'));
      

      return ($data);   
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
