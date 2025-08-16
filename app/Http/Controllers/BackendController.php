<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackendController extends Controller
{   
    private $nombres = [ 
            1=>['nombre'=>'Ana','edad'=>35],
            2=>['nombre'=>'Abraham','edad'=>33],
            3=>['nombre'=>'Angie','edad'=>23],
    ];
    public function getAll(){
        return response ()-> json ($this->nombres);
    }

    public function get(int $id =0){
        if(isset($this->nombres[$id])){
            return response ()-> json ($this->nombres[$id]);
        }
        return response ()->json (['error'=>"Persona no existe"], Response::HTTP_NOT_FOUND);
        ;
    }
    public function create(Request $request){
        $persona=[ 
            "id"=> count($this->nombres)+1,
            "nombre"=>$request->input('nombre'), 
            "edad"=>$request->input('edad'),
        ];
        $this->nombres[$persona["id"] ]= $persona;
        return response()->json (["message"=>"Persona creada","persona"=> $persona], Response::HTTP_CREATED);


    }
    public function update(Request $request,$id){
         if(isset($this->nombres[$id])){
            $this->nombres[$id]["nombre"]=$request -> input("nombre",$this->nombres[$id]["nombre"]);
            $this->nombres[$id]["edad"]=$request -> input("edad",$this->nombres[$id]["edad"]);
            return response ()->json (['message'=>"Persona actualizada","persona"=>$this->nombres[$id]]);
        }
        return response ()->json (['error'=>"Persona no existe"], Response::HTTP_NOT_FOUND);
        

    }
    public function delete($id){
        if(isset($this->nombres[$id])){
            unset($this->nombres[$id]);
            return response ()->json (['message'=>"Persona eliminada"]);
        }
        return response ()->json (['error'=>"Persona no existe"], Response::HTTP_NOT_FOUND);

    }
}
