<?php

namespace App\Http\Controllers;

use App\Mail\UneteMailable;
use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Momentcontact;
use App\Models\Province;
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

        $messages = [
            'country_id.required' => 'El campo País es obligatorio.',
            'department_id.required' => 'El campo Departamento es obligatorio.',
            'province_id.required' => 'El campo Provincia es obligatorio.',
            'district_id.required' => 'El campo Distrito es obligatorio.',
            'momentcontact_id.required' => 'El campo Momento Llamarlo es obligatorio.',
        ];

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'country_id' => 'required',
            'department_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'direccion' => 'required',
            'momentcontact_id' => 'required',
            'aceptoPolitica' => 'required',
        ], $messages);

        /* Inicio Momento Contacto */
        $momentcontact = Momentcontact::find($request['momentcontact_id']);
        if ($momentcontact) {
            $request->request->add(['momentcontact' => $momentcontact->name]);
        } else {
            $request->request->add(['momentcontact' => 'Hubo un error']);
        }
        /* Fin Momento Contacto */

        /* Inicio Pais */
        $country = Country::find($request['country_id']);
        if ($country) {
            $request->request->add(['country' => $country->name]);
        } else {
            $request->request->add(['country' => 'Hubo un error']);
        }
        /* Fin Pais */

        /* Inicio Departamento */
        $department = Department::find($request['department_id']);
        if ($department) {
            $request->request->add(['department' => $department->name]);
        } else {
            $request->request->add(['department' => 'Hubo un error']);
        }
        /* Fin Departamento */

        /* Inicio Provincia */
        $province = Province::find($request['province_id']);
        if ($province) {
            $request->request->add(['province' => $province->name]);
        } else {
            $request->request->add(['province' => 'Hubo un error']);
        }
        /* Fin Provincia */

        /* Inicio Distrito */
        $district = District::find($request['district_id']);
        if ($district) {
            $request->request->add(['district' => $district->name]);
        } else {
            $request->request->add(['district' => 'Hubo un error']);
        }
        /* Fin Distrito */
                
        $correo = new UneteMailable($request->all());
        Mail::to($email)->send($correo);

        return redirect()->route("unete.index")
                        ->with('info', 'Mensaje enviado');
    }
}
