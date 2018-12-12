<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Projeto1\categoria;
use Illuminate\Support\Facedes\Redirect;
use Projeto1\Http\Requests\CategoriaFormRequest;
use DB; 
class CategoriaController extends Controller
{
   
   public function __construct(){
    
    

   }

  public function index(Request $request){

   if($request){
  
       $query=trim($request->get('searchText'));
       $categoria=DB::table('categoria')
       ->where('nome','LIKE','%'.$query.'%') 
       ->orderBy('idcategoria','desc')
       ->paginate(7);
       return view('estoque.categoria.index', [
         
         "categorias" => $categorias,"searchText"=>$query;  
 

       	]);
      
      }


  }

  public function create("estoque.categoria.create"){


  	
  }
  
  public function store(CategoriaFormRequest $request){
  	$categoria = new categoria;
  	$categoria->nome=$request->get('nome');
  	$categoria->descricao=$request->get('descricao');
  	$categoria->save();
  	return Redirect::to('estoque/categoria');  


  	
  }

  public function show($id){

    return view("estoque.categoria.show",
    	
    	["Categoria"=>categoria::findOrfall($id)]);

  	
  }

  public function edit(){
  
   return view("estoque.categoria.edit",
    	
    	["Categoria"=>categoria::findOrfall($id)]);


  	
  }

  public function update(CategoriaFormRequest $request){
       $categoria = categoria::findOrfall($id)
       $categoria->nome=$request->get('nome');
       $categoria->descricao=$request->get('descricao');
       $categoria->update();

       return Redirect::to('estoque/categoria'); 

  	
  }

  public function destroy($id){
       $categoria = categoria::findOrfall($id)
       $categoria->nome=$request->get('nome');
       $categoria->delete();
       $categoria->update();

       return Redirect::to('estoque/categoria');
 
  }

}
