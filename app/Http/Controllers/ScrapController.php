<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Scrap;
use Illuminate\Support\Facades\Redirect;
use DB;
use Goutte;
use File;
ini_set('max_execution_time', 300); //3 minutes
class ScrapController extends Controller
{
   public function __construct()
   	{
   	}
   public function index(Request $request)
   	{
      $radio=$request->get('radio');
      $borr=[];
      $fa=[];
     if ($radio=='cbeba' || !$request->get('radio') ){       
         $carbeba=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebas');
         $alb="1474268852893493"; 
         $albu=$radio;
         $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);        
        foreach ($carbeba as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
          if ($col2){
            $html1 = 'http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=';
            $html2 = substr(strstr($key,'-'),1,-4);
            $html = "$html1$html2";
           
            $crawler = Goutte::request('GET', $html);
            if ($crawler->filterXPath('//div[@id="primary-nohits"]')->count()>0){
              $disp="NO hay Disponibilidad de producto";
            }
            else{ $disp="SI";}
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu, 'disp'=>$disp];
                     
          }           
         }
       }
      elseif ($radio=='cbebe') {        
        $carbebe=File::files('/xampp/htdocs/tienda/public/images/productos/carters_bebes');
         $alb="1473359842984394"; 
         $albu=$radio;
         $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carbebe as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
          if ($col2){
            $html1 = 'http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=';
            $html2 = substr(strstr($key,'-'),1,-4);
            $html = "$html1$html2";
           
            $crawler = Goutte::request('GET', $html);
            if ($crawler->filterXPath('//div[@id="primary-nohits"]')->count()>0){
              $disp="NO hay Disponibilidad de producto";
            }
            else{ $disp="SI";}
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu, 'disp'=>$disp];
                  
              }           
         }        
      }
      elseif ($radio=='cnena') {
        $carnena=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenas');
         $alb="1476399469347098";  
          $albu=$radio;    
         $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carnena as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
          if ($col2){
             $html1 = 'http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=';
            $html2 = substr(strstr($key,'-'),1,-4);
            $html = "$html1$html2";
           
            $crawler = Goutte::request('GET', $html);
            if ($crawler->filterXPath('//div[@id="primary-nohits"]')->count()>0){
              $disp="NO hay Disponibilidad de producto";
            }
            else{ $disp="SI";}
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu, 'disp'=>$disp];
                  
              }           
         }       
      }
      elseif ($radio=='cnene') {
         $carnene=File::files('/xampp/htdocs/tienda/public/images/productos/carters_nenes');
         $alb="1475944139392631"; 
         $albu=$radio;    
         $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($carnene as $key ) {
          $cod=strstr(substr($key,59),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
          if ($col2){
             $html1 = 'http://www.carters.com/on/demandware.store/Sites-Carters-Site/default/Search-Show?q=';
            $html2 = substr(strstr($key,'-'),1,-4);
            $html = "$html1$html2";
           
            $crawler = Goutte::request('GET', $html);
            if ($crawler->filterXPath('//div[@id="primary-nohits"]')->count()>0){
              $disp="NO hay Disponibilidad de producto";
            }
            else{ $disp="SI";}
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu, 'disp'=>$disp];
                  
              }           
         }  
      }
      elseif ($radio=='hnena') {
        $hymnena=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenas');
         $alb="1472453289741716";
         $albu=$radio;    
         $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($hymnena as $key ) {
          $cod=strstr(substr($key,55),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if ($col2){
             $html1 = 'http://www.hm.com/us/product/';
            $html2 = substr(substr(strstr($key,'-'),1,-4),0,-2);
            $html3 = substr(substr(strstr($key,'-'),1,-4),0,-1);
            $html4 = substr(substr(strstr($key,'-'),1,-4),-1);
            $html = "$html1$html2?article=$html3$html4";
            
            $crawler = Goutte::request('GET', $html);
                      

            if ($crawler->filterXPath('//div[@id="errorMessage"]')->count()>0 || $crawler->filterXPath('//button[@class="btn bag large disabled soldOut"]')->count()>0) {
              $disp="NO hay Disponibilidad de producto";
            }
            else{ $disp="SI";}
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu, 'disp'=>$disp];
              }  
                   
         }
      }
      elseif ($radio=='hnene') {
        $hymnene=File::files('/xampp/htdocs/tienda/public/images/productos/hym_nenes');
         $alb="1472916719695373";  
         $albu=$radio;    
          $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($hymnene as $key ) {
          $cod=strstr(substr($key,55),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if ($col2){
             $html1 = 'http://www.hm.com/us/product/';
            $html2 = substr(substr(strstr($key,'-'),1,-4),0,-2);
            $html3 = substr(substr(strstr($key,'-'),1,-4),0,-1);
            $html4 = substr(substr(strstr($key,'-'),1,-4),-1);
            $html = "$html1$html2?article=$html3$html4";
            
            $crawler = Goutte::request('GET', $html);
                      

            if ($crawler->filterXPath('//div[@id="errorMessage"]')->count()>0 || $crawler->filterXPath('//button[@class="btn bag large disabled soldOut"]')->count()>0) {
              $disp="NO hay Disponibilidad de producto";
            }
            else{ $disp="SI";}
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu, 'disp'=>$disp];
              }           
         }         
      }
      elseif ($radio=='skip') {
         $skip=File::files('/xampp/htdocs/tienda/public/images/productos/skyp_hop');
         $alb="1837283549925353"; 
         $albu=$radio;    
          $face=Scrap::datafaceidalbum($alb);
         $col = Collection::make($face);     
         foreach ($skip as $key ) {
          $cod=strstr(substr($key,54),'-',True);
          $col2=$col 
            ->where('code',$cod)     
            ->first();           
              if ($col2){
            $fa[]=$col2+['codcar'=>substr(strstr($key,'-'),1,-4),'alb'=>$albu];
              }           
         }  
      }
     
     
            
      
      return view('buscar\scrap.index',["borr"=>$borr, "radio"=>$radio, "fa"=>$fa]);
     

        
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
