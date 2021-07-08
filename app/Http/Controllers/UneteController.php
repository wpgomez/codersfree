<?php

namespace App\Http\Controllers;

use App\Mail\UneteMailable;
use App\Models\Momentcontact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UneteController extends Controller
{
    public function index()
    {
        return view('unete.index');
    }

    public function store(Request $request)
    {
        $email = env('CATALOGO_EMAIL', '');
        if (!$email) {
            return redirect()->route("unete.index")
                            ->with('error', 'Se produjo error al enviar.');
        }

        /* return $request->all(); */

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'contry_id' => 'required',
            'department_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'direccion' => 'required',
            'momentcontact_id' => 'required',
            'aceptoPolitica' => 'required',
        ]);

        /* Inicio Momento Contacto */
        $momentcontact = Momentcontact::find($request['momentcontact_id']);
        if ($momentcontact) {
            $request->request->add(['momentcontact' => $momentcontact->name]);
        } else {
            $request->request->add(['momentcontact' => 'Hubo un error']);
        }
        /* Fin Momento Contacto */

        
                
        $correo = new UneteMailable($request->all());
        Mail::to($email)->send($correo);

        return redirect()->route("unete.index")
                        ->with('info', 'Mensaje enviado');
    }
}
