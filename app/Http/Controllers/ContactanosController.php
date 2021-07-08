<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('contactanos.index');
    }
    
    public function store(Request $request)
    {
        $email = env('CATALOGO_EMAIL', '');
        if (!$email) {
            return redirect()->route("contactanos.index")
                            ->with('error', 'Se produjo error al enviar.');
        }

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to($email)->send($correo);

        return redirect()->route("contactanos.index")
                        ->with('info', 'Mensaje enviado');
    }
}
