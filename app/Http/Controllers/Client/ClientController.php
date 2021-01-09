<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function get()
    {
        return view('clients');
    }
    

    public function register(Request $request){
        $usuario = new Client;

            $usuario->identification=$request->identification;
            $usuario->name=$request->name;
            $usuario->address=$request->address;
            $usuario->phone=$request->phone;
            $usuario->email=$request->email;
            $usuario->save();
            toastr()->success('El cliente '.$usuario->name.', se registro correctamente.');
            return back();
                   
    }

    public function edit(Request $request,$id){
        $usuario = Client::find($id);
     
        $usuario->identification=$request->identification;
        $usuario->name=$request->name;
        $usuario->address=$request->address;
        $usuario->phone=$request->phone;
        $usuario->email=$request->email;
        
        if($usuario->save()){
            toastr()->success('El cliente '.$usuario->name.', se edito correctamente.');
            return back();
        }
   
    }

    public function list(){
        $usuarios = DB::table('clients')->get();

        return $usuarios;
    }
    public function delete($id){
       $usuario = Client::findorfail($id);
       $usuario->delete();
       return 200;
    }
}
