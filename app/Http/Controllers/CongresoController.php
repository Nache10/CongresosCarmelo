<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Auth;
use App\Pago;
use App\User;
use App\Ponencia;
use App\UserPonencia;
use App\Congreso;

class CongresoController extends Controller
{

    public function __construct()
    {
    }

    public function create(Request $request){
        $varpago = null;
        if(Auth::user()->type==='asistente'){
            $pago = Pago::where('iduser', (Auth::user()->id))->first();
        
            $varpago=null;
            
            if($pago === null){
                $varpago = false;
            } else if( $pago->documento != null && $pago->verificado == false){
                $varpago = true;
            }
        }
        
        $congreso = Congreso::all()->first();
        $ponencias = Ponencia::all();
        if($congreso === null){
            $congreso = new Congreso($request->all());
            $congreso->save();
            return view('home')->with(['congress'=>'ok','varpago'=>$varpago,'congreso'=>$congreso,'ponencias'=>$ponencias]);
        }
        return view('home')->with(['varpago'=>$varpago,'congreso'=>$congreso,'ponencias'=>$ponencias,'congress'=>'notok']);
       
       
   }
}
