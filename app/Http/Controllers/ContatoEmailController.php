<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContatoEmail;
use Illuminate\Support\Facades\Mail;

class ContatoEmailController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'assunto' => 'required',
            'msg' => 'required'
        ]);

        $dados = [
            'name' => $request['name'],
            'email' => $request['email'],
            'assunto' => $request['assunto'],
            'msg' => $request['msg'],
        ];

        $emailEmpresa = 'mazesuporte.negocios@gmail.com';
        
        Mail::to($emailEmpresa)->send(new ContatoEmail($dados));

        return redirect()->route('index.maze')
                         ->with('success', 'Email de Contato Enviado Com Sucesso');
    }
}
