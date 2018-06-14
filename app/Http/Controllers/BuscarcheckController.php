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


class BuscarcheckController extends Controller
{
   public function __construct()
   	{
   	}

   private function listaAlbum($album){
    $lista=DB::table('facebook')
      ->where ('album',$album)
      ->get();
    return($lista);
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
      $radio=$request->get('radio');
      $lista=$this->listaAlbum($radio);    
      $idalbum=mb_substr($request->get('searchText'),0,1); 
      $query=trim($request->get('searchText'));        
      
      if ($radio){
         $col2=$this->buscarEnAlbum($radio,$query);          
      }      
      else{
        $col2=$this->buscarEnAlbum("cbeba", $query);
        $lista=$this->listaAlbum("cbeba");   
      }        
      
        
      if($idalbum=="5" || $idalbum=="6"){
        if ($col2 === NULL){
          $col2=new Buscar;
          $col2->code="No existe Producto con el Codigo $query en el Album";
          $col2->foto="http://tienda.ar/img/1.png";
        }     
        $html1 =substr($col2->style,0,-2);
        $html2 =$col2->style;
        $html = "http://www.hm.com/us/product/$html1?article=$html2";      

        #$crawler = Goutte::request('GET', $html);
        $client = new Client();
        $crawler = $client->request('GET', $html);

        if ($crawler->filterXPath('//button[@class="btn bag large disabled soldOut"]')->count()>0){
          $disp="No hay Disponibilidad";
        }        
        else{ 
          #$disp="Hay talles varios, ver!!";
          $as5=$crawler->filterXPath('//li[@class="width5"]')
                      ->extract(('_text'));
                      
          $as5= preg_replace("/(\n|\t)/", '', $as5);
         
          $as4=$crawler->filterXPath('//li[@class="width4"]')
                      ->extract(('_text'));
                      
          $as4= preg_replace("/(\n|\t)/", '', $as4);
         
          $disp="";
          
          foreach ($as4 as $key => $value) {           
            $disp="$disp $value";            
          }
          foreach ($as5 as $key => $value) {           
            $disp="$disp $value";            
          }  
          $disp=mb_substr($disp,6);
          $disp=str_replace(' ', '', $disp);        
         #dd($disp);
        }    
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
          elseif ($crawler->filterXPath('//div[@class="not-available"]')->count()>0) {
             $disp="No hay Disponibilidad";
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

      return view('buscar.check.index',["lista"=>$lista,"col2"=>$col2,"searchText"=>$query,"radio"=>$radio, "disp"=>$disp]);

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
	public function destroy(Request $request, $id)
	{
    	 $todo=Formavieja::findOrFail($id);       
       $idfacebook=$request->get('idfacebook');
       $url="https://graph.facebook.com/v2.12/$idfacebook?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&method=delete";  
       $todo->delete();
       $codeSig=$request->get('codeSig');

       $resp = json_decode(file_get_contents($url));   
        #dd($idfacebook, $resp);
       return Redirect::back(); 
      #dd($todo, $request->get('idfacebook'));
	}

  public function destroyAjax(Request $request)
  {
       $todo=Formavieja::findOrFail($request->get('tempp'));       
       $idfacebook=$request->get('idface');
       $codeSig=$request->get('code1');
       $radio=$request->get('radio');
       if($radio==NULL){
        $radio="cbeba";
       }
      
       $url="https://graph.facebook.com/v2.12/$idfacebook?access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&method=delete";  
       $todo->delete();
       $resp = json_decode(file_get_contents($url));   
       
       return ["id"=>$request->get('tempp'), "idfacebook"=>$idfacebook, "codeSig"=>$codeSig, "radio"=>$radio]; 
     
  }

  public function editAjax(Request $request)
  {
       $todo=Formavieja::findOrFail($request->get('id'));       
       $idfacebook=$request->get('idface');
       $name=$request->get('name');      
      
       $url="https://graph.facebook.com/v2.12/$idfacebook?name=$name&access_token=EAAUJuPkcQtkBAAaM9R5q2YZAmSFXeJDh5NMZBskyZBdXiahvOmj54j6ryDWybVJlBUb75avyM4aJ4x2vUiCtZAF4vAOV9OclIK6ZACPOKTbcUMNMdkGrc7s8av8g6VoHCebU3ArjUlYtyfZCZBEm3eRjZBDcUpKvfd86qh7nj0N3UgZDZD&method=post";  
       #$todo->name=$name;
       #$todo->update();
       $resp = json_decode(file_get_contents($url));   
       
       return ["id"=>$request->get('id'), "idfacebook"=>$idfacebook, "name"=>$name, "resp"=>$resp]; 
     
  }

  public function busquedaAjax(Request $request){

      $idalbum=mb_substr($request->get('code'),0,1); 
      $query=trim($request->get('code'));
      $radio=$request->get('radio');        
      
      if ($radio){
         $col2=$this->buscarEnAlbum($radio,$query);          
      }      
      else{
        $col2=$this->buscarEnAlbum("cbeba", $query);   
      }       
      
        
      if($idalbum=="5" || $idalbum=="6"){
        if ($col2 === NULL){
          $col2=new Buscar;
          $col2->code="No existe Producto con el Codigo $query en el Album";
          $col2->foto="http://tienda.ar/img/1.png";
        }      
        $html1 =substr($col2->style,0,-2);
        $html2 =$col2->style;
        $html = "http://www.hm.com/us/product/$html1?article=$html2";      

        #$crawler = Goutte::request('GET', $html);
        $client = new Client();
        $crawler = $client->request('GET', $html);

        if ($crawler->filterXPath('//button[@class="btn bag large disabled soldOut"]')->count()>0){
          $disp="No hay Disponibilidad";
        }        
        else{ 
          #$disp="Hay talles varios, ver!!";
          $as5=$crawler->filterXPath('//li[@class="width5"]')
                      ->extract(('_text'));
                      
          $as5= preg_replace("/(\n|\t)/", '', $as5);
         
          $as4=$crawler->filterXPath('//li[@class="width4"]')
                      ->extract(('_text'));
                      
          $as4= preg_replace("/(\n|\t)/", '', $as4);
         
          $disp="";
          
          foreach ($as4 as $key => $value) {           
            $disp="$disp $value";            
          }
          foreach ($as5 as $key => $value) {           
            $disp="$disp $value";            
          } 
          $disp=mb_substr($disp,6);
          $disp=str_replace(' ', '', $disp);        
          
        }    
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
          $as=$crawler->filterXPath('//ul[@class="swatches size"]')->children()
                      ->extract(('_text'));
          $as= preg_replace("/(\n|\t)/", '', $as);
          $disp="";
          foreach ($as as $key => $value) {           
            $disp="$disp $value";            
          }          
        }
        else{ 
          $disp="";
        }
      }
      if ($idalbum =="1" || $idalbum =="2" || $idalbum =="3" || $idalbum =="4" || $idalbum =="7") {
        $href="http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=$col2->style";
      }      
      else {
        $art=substr($col2->style,0,-2);
        $href="http://www.hm.com/us/product/$art?article=$col2->style";
      }
      $code=$col2->code;
      $style=$col2->style;
      $link=$col2->link;
      $img=$col2->foto;
      $id=$col2->id;
      $name=$col2->name;
                                                   
      #dd($col2);
      return ["id"=>$id,"name"=>$name,"code"=>$code, "href"=>$href,"searchText"=>$query, "disp"=>$disp, "style"=>$style,"link"=>$link,"img"=>$img];

  }
}
