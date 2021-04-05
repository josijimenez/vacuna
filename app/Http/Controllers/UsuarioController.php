<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;
use App\Models\Catalogo;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use DateTime;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends AppBaseController
{
   

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
               	
        $tipo = Catalogo::where('nombre', 'TIPO_USUARIO')->first();
        $tipos = Item::where('catalogos_id', $tipo->id)->pluck('nombre', 'nombre');

        $institucion = Catalogo::where('nombre', 'INSTITUCION')->first();;
        $instituciones = Item::where('catalogos_id', $institucion->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();;
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        $query = User::query();

        if ( $request->has('nombres') && trim($request->input('nombres')) !== '' ){
            $query = $query->orWhere('users.name', 'like', '%' . trim($request->input('nombres')) . '%');
        }

        if ( $request->has('tipo') && trim($request->input('tipo')) !== '' ){
           $query = $query->orWhere('users.type', 'like', '%' . trim($request->input('tipo')) . '%');
        }

        if ( $request->has('institucion') && trim($request->input('institucion')) !== '' ){
            $query = $query->orWhere('users.institucion', 'like', '%' . trim($request->input('institucion')) . '%');
        }

        if ( $request->has('puesto_vacunacion') && trim($request->input('puesto_vacunacion')) !== '' ){
            $query = $query->orWhere('users.puesto_vacunacion', 'like', '%' . trim($request->input('puesto_vacunacion')) . '%');
        }

        //$users = $query->orderBy('users.name', 'asc')->paginate(10);

        $users = $query->select('users.*')->distinct()->orderBy('users.name', 'asc')->paginate(10);

        return view('usuarios.index')
            ->with('users', $users)->with('tipos', $tipos)->with('instituciones', $instituciones)->with('puestos', $puestos);
    }

    /**
     * Show the form for creating a new Persona.
     *
     * @return Response
     */
    public function create()
    {

        $tipo = Catalogo::where('nombre', 'TIPO_USUARIO')->first();
        $tipos = Item::where('catalogos_id', $tipo->id)->pluck('nombre', 'nombre');

        $institucion = Catalogo::where('nombre', 'INSTITUCION')->first();;
        $instituciones = Item::where('catalogos_id', $institucion->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();;
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        /*return view('personas.create',
            compact(
                'provincias'
            )
        ); */

        return view('usuarios.create')
            ->with('tipos', $tipos)->with('instituciones', $instituciones)->with('puestos', $puestos);
    }

    /**
     * Store a newly created Persona in storage.
     *
     * @param CreatePersonaRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
       
        $input = $request->all();

        $rules =  [
            'name'                  => 'required|string|max:255|unique:users|alpha_dash',
            'email'                 => 'required|email|max:255|unique:users',
            'password'              => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|string|same:password',
        ];


        $messages = [
            'name.unique'         => 'Campo Nombre, ya se encuentra registrado!',
            'name.required'       => 'Campo Nombre, es requerido!',
            'email.required'      => 'Campo Email, es requerido!',
            'email.email'         => 'Campo Email, es inválido!',
            'email.unique'        => 'Campo Email, ya se encuentra registrado!',
            'password.required'   => 'Campo Password, es requerido!',
            'password.min'        => 'Campo Password, no cumple el mínimo de carasteres!',
            'password.max'        => 'Campo Password, sobrepasa el máximo de caracteres!',
        ];  

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {
           //return back()->withErrors($validator)->withInput();

            return redirect(route('usuarios.create'))
                            ->withErrors($validator)
                            ->withInput();

        }

        //$persona = $this->personaRepository->create($input);

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'type' => $input['type'],
            'puesto_vacunacion' => $input['puesto_vacunacion'],
            'institucion' => $input['institucion'],
        ]);

        Flash::success('Persona saved successfully.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified Persona.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        return view('personas.show')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified Persona.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //$persona = $this->personaRepository->find($id);
        $usuario = User::find($id);

       
        $tipo = Catalogo::where('nombre', 'TIPO_USUARIO')->first();
        $tipos = Item::where('catalogos_id', $tipo->id)->pluck('nombre', 'nombre');

        $institucion = Catalogo::where('nombre', 'INSTITUCION')->first();;
        $instituciones = Item::where('catalogos_id', $institucion->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();;
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');
        
        //$provincia = Catalogo::find(1);//dd($provincias);
        //exit(0);
        //die();

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('usuarios.index'));
        }

        /*return view('personas.edit')->with('persona', $persona);*/
        return view('usuarios.edit')->with('usuario', $usuario)->with('tipos', $tipos)->with('instituciones', $instituciones)->with('puestos', $puestos);
    }

    /**
     * Update the specified Persona in storage.
     *
     * @param int $id
     * @param UpdatePersonaRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $usuario = User::find($id);

        if (empty($usuario)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('usuarios.index'));
        }


        $rules =  [
            'name'                  => 'required|string|max:255|unique:users,name,' .  $id,
            'email'                 => 'required|email|max:255|unique:users,email,' .  $id,
        ];


        $messages = [
            'name.unique'         => 'Campo Nombre, ya se encuentra registrado!',
            'name.required'       => 'Campo Nombre, es requerido!',
            'email.required'      => 'Campo Email, es requerido!',
            'email.email'         => 'Campo Email, es inválido!',
            'email.unique'        => 'Campo Email, ya se encuentra registrado!',
            'password.required'   => 'Campo Password, es requerido!',
            'password.min'        => 'Campo Password, no cumple el mínimo de carasteres!',
            'password.max'        => 'Campo Password, sobrepasa el máximo de caracteres!',
        ];  


        //$emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
        $passwordCheck = $request->input('password') != null;

      
        //if ($emailCheck) {
        //    $rules['email'] = 'required|email|max:255|unique:users';
        //}

        if ($passwordCheck) {
            $rules['password'] = 'required|string|min:6|max:20|confirmed';
            $rules['password_confirmation'] = 'required|string|same:password';
            $messages['password.required'] = 'Campo Password, es requerido!';
            $messages['password.min'] = 'Campo Password, no cumple el mínimo de carasteres!';
            $messages['password.max'] = 'Campo Password, sobrepasa el máximo de caracteres!';
        }

     

         $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $usuario->name = strip_tags($request->input('name'));
        $usuario->email = $request->input('email');
        $usuario->type = $request->input('type');
        $usuario->puesto_vacunacion = $request->input('puesto_vacunacion');
        $usuario->institucion = $request->input('institucion');

        //if ($emailCheck) {
        //    $usuario->email = $request->input('email');
        //}

        if ($passwordCheck) {
            $usuario->password = Hash::make($request->input('password'));
        }

        $usuario->save();

        Flash::success('Persona updated successfully.');
        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified Persona from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        $this->personaRepository->delete($id);

        Flash::success('Persona deleted successfully.');

        return redirect(route('personas.index'));
    }

    public function aux(Request $request){
        
        $provincia_aux = Catalogo::where('nombre', 'PROVINCIA')->first();
        $provincias = Item::where('catalogos_id', $provincia_aux->id)->pluck('nombre', 'nombre');

        $ciudad_aux = Catalogo::where('nombre', 'CIUDAD')->first();
        $ciudades = Item::where('catalogos_id', $ciudad_aux->id)->pluck('nombre', 'nombre');

        $puesto_vacunacion_aux = Catalogo::where('nombre', 'PUNTO_VACUNACION')->first();
        $puesto_vacunaciones = Item::where('catalogos_id', $puesto_vacunacion_aux->id)->pluck('nombre', 'nombre');

        $query = Persona::query();

        if ( $request->has('provincia') && trim($request->input('provincia')) !== '' ){
            $query = $query->orWhere('personas.provincia', 'like', '%' . trim($request->input('provincia')) . '%');
        }

        if ( $request->has('ciudad') && trim($request->input('ciudad')) !== '' ){
            $query = $query->orWhere('personas.ciudad', 'like', '%' . trim($request->input('ciudad')) . '%');
        }

        if ( $request->has('puesto_vacunacion') && trim($request->input('puesto_vacunacion')) !== '' ){
            $query = $query->orWhere('personas.puesto_vacunacion', 'like', '%' . trim($request->input('puesto_vacunacion')) . '%');
        }

        $personas = $query->select('personas.*')->distinct()->orderBy('personas.nombres', 'asc');

        return Excel::download(new PersonasExport, 'candidatos.xlsx');
    }

    
    public function export(Request $request){

        return Excel::download(new PersonasExport, 'candidatos.xlsx');
    }

    public function test(Request $request){

        $response = Http::post('https://coresalud.msp.gob.ec/coresalud/app.php/publico/rpis/afiliacion/consultafiliacion/1102051397/17-03-2021');
        
        $cadena = $response->body();

        $tuArray = array();
        $tuArray = explode("\n", $cadena);

        $nombre = null;
        $fecha_nacimiento = null;

        foreach($tuArray as  $indice => $palabra){
            
            if($indice == 6){
                $nombre = $palabra;
                continue;
            }
            if($indice == 10){
                 $fecha_nacimiento = $palabra;
                 break;
            }
          
        }  


        $parte1 = explode('<span class="label label-success">',$nombre);
        $parte2 = explode('</span>',$parte1[1]);
        $nombre = $parte2[0];

        
        if(empty($nombre)){
            print_r("Algo es mal...");
            exit(0);
        }

        $parte1=explode('<span class="label label-success">Fecha Nacimiento: ',$fecha_nacimiento);
        $parte2=explode('</span>',$parte1[1]);
        $fecha_nacimiento= $parte2[0];

        print_r($nombre . $fecha_nacimiento);
        exit(0);

        $data = [];
        array_push($data, $nombre);
        array_push($data, $fecha_nacimiento);

        //return response()->json($data);
        return Response::json($data);
        
    }


    public function cedula($cedula, Request $request){

        //print_r($cedula);
        //exit(0);

        //print_r($cedula);
        //exit(0);

        $hoy = date("d-m-Y"); 

        //$response = Http::post('https://coresalud.msp.gob.ec/coresalud/app.php/publico/rpis/afiliacion/consultafiliacion/1104517493/17-03-2021');
        $response = Http::post('https://coresalud.msp.gob.ec/coresalud/app.php/publico/rpis/afiliacion/consultafiliacion/' . $cedula . '/' . $hoy  );
        
        $cadena = $response->body();

        $tuArray = array();
        $tuArray = explode("\n", $cadena);

        $nombre = null;
        $fecha_nacimiento = null;

        foreach($tuArray as  $indice => $palabra){
            
            if($indice == 6){
                $nombre = $palabra;
                continue;
            }
            if($indice == 10){
                 $fecha_nacimiento = $palabra;
                 break;
            }
          
        }  


        $parte1 = explode('<span class="label label-success">',$nombre);
        $parte2 = explode('</span>',$parte1[1]);
        $nombre = $parte2[0];

        
        if(empty($nombre)){
            //print_r("Algo es mal...");
            //exit(0);
            return Response::json([], 400);
           

        } else {

            $parte1=explode('<span class="label label-success">Fecha Nacimiento: ',$fecha_nacimiento);
            $parte2=explode('</span>',$parte1[1]);
            $fecha_nacimiento = $parte2[0];

            //print_r($nombre . $fecha_nacimiento);
            //exit(0);

            $data = [];
            array_push($data, $nombre);
            array_push($data, $fecha_nacimiento);

            //$fecha_nacimiento = date("Y-m-d", strtotime($fecha_nacimiento));
            //$date = date_create($fecha_nacimiento);
            //$fecha_nacimiento = date_format($date,"Y-m-d");
            //$date = new DateTime($fecha_nacimiento);
            //$fecha_nacimiento = $date->format('Y-m-d'); // 18-11-2016

            //fecha_nacimiento    "10/06/1986"
            $myDateTime = DateTime::createFromFormat('d/m/Y', $fecha_nacimiento);
            $fecha_nacimiento = $myDateTime->format('Y-m-d');

            $persona = array('nombre'=> $nombre, 'fecha_nacimiento'=> $fecha_nacimiento);
            //return response()->json($data);

            //print_r($data);
            //exit(0);
       

           

            $msg = "This is a simple message.";
            //return response()->json(array('msg'=> $msg), 200);
            return Response::json($persona, 200);

        }

     


    }

    public function temp(Request $request){

        $provincia_aux = Catalogo::where('nombre', 'PROVINCIA')->first();
        $provincias = Item::where('catalogos_id', $provincia_aux->id)->pluck('nombre', 'nombre');

        $ciudad_aux = Catalogo::where('nombre', 'CIUDAD')->first();
        $ciudades = Item::where('catalogos_id', $ciudad_aux->id)->pluck('nombre', 'nombre');

        $puesto_vacunacion_aux = Catalogo::where('nombre', 'PUNTO_VACUNACION')->first();
        $puesto_vacunaciones = Item::where('catalogos_id', $puesto_vacunacion_aux->id)->pluck('nombre', 'nombre');

        $provincia = null;
        $ciudad = null;
        $puesto_vacunacion = null;
       
        if ( $request->has('provincia') && trim($request->input('provincia')) !== '' ){
           $provincia = trim($request->input('provincia'));
        }

        if ( $request->has('ciudad') && trim($request->input('ciudad')) !== '' ){
             $ciudad = trim($request->input('ciudad'));
        }

        if ( $request->has('puesto_vacunacion') && trim($request->input('puesto_vacunacion')) !== '' ){
           $puesto_vacunacion = trim($request->input('puesto_vacunacion'));
        }

        return Excel::download(new PersonasExport, 'candidatos.xlsx');
    }

    
    public function informe(Request $request)
    {
        $puesto_vacunacion = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puesto_vacunaciones = Item::where('catalogos_id', $puesto_vacunacion->id)->pluck('nombre', 'nombre');
    
        return view('personas.reporte_excel')->with('puesto_vacunaciones', $puesto_vacunaciones);
    }

    public function excel(Request $request)
    {
        $puesto_vacunacion_aux = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puesto_vacunaciones = Item::where('catalogos_id', $puesto_vacunacion_aux->id)->pluck('nombre', 'nombre');

        $puesto_vacunacion = null;
       
        if ( $request->has('puesto_vacunacion') && trim($request->input('puesto_vacunacion')) !== '' ){
           $puesto_vacunacion = trim($request->input('puesto_vacunacion'));

           }
       
        return Excel::download(new PersonasExport($puesto_vacunacion), 'candidatos.xlsx');
    }


    public function informe_completo(Request $request)
    {

        $farmaceutica = Catalogo::where('nombre', 'FARMACEUTICA')->first();
        $farmaceuticas = Item::where('catalogos_id', $farmaceutica->id)->pluck('nombre', 'nombre');
        
        $provincia = Catalogo::where('nombre', 'PROVINCIA')->first();
        $provincias = Item::where('catalogos_id', $provincia->id)->pluck('nombre', 'nombre');

        $ciudad = Catalogo::where('nombre', 'CIUDAD')->first();
        $ciudades = Item::where('catalogos_id', $ciudad->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');
    
        return view('personas.reporte_excel_completo')->with('farmaceuticas', $farmaceuticas)->with('provincias', $provincias)->with('ciudades', $ciudades)->with('puestos', $puestos);
    

    }


    public function excel_completo(Request $request){
       
        return Excel::download(new VacunadosExport($request), 'candidatos.xlsx');
    }



      /**
     * Show the form for register primera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function register_primera($id)
    {
        $persona = $this->personaRepository->find($id);

        $farmaceutica = Catalogo::where('nombre', 'FARMACEUTICA')->first();
        $farmaceuticas = Item::where('catalogos_id', $farmaceutica->id)->pluck('nombre', 'nombre');
        
        $provincia = Catalogo::where('nombre', 'PROVINCIA')->first();
        $provincias = Item::where('catalogos_id', $provincia->id)->pluck('nombre', 'nombre');

        $ciudad = Catalogo::where('nombre', 'CIUDAD')->first();
        $ciudades = Item::where('catalogos_id', $ciudad->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        $equipo = Catalogo::where('nombre', 'PRIMER_EQUIPO_VACUNADOR')->first();
        $equipos = Item::where('catalogos_id', $equipo->id)->pluck('nombre', 'nombre');

        
        //$provincia = Catalogo::find(1);//dd($provincias);
        //exit(0);
        //die();

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        /*return view('personas.edit')->with('persona', $persona);*/
        return view('personas.primera')->with('persona', $persona)->with('farmaceuticas', $farmaceuticas)->with('provincias', $provincias)->with('ciudades', $ciudades)->with('puestos', $puestos)->with('equipos', $equipos);
    }


     /**
     * Update the specified Persona in storage.
     *
     * @param int $id
     * @param UpdatePrimera $request
     *
     * @return Response
     */
    public function update_primera($id, UpdatePersonaRequest $request)
    {
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

    
        $rules =  [
            'primera_vacunado' => 'required',
            'primera_farmaceutica' => 'required',
            'primera_provincia' => 'required',
            'primera_ciudad' => 'required',
            'primera_puesto' => 'required',
            'primera_equipo' => 'required',
            'primera_fecha' => 'required',
            'primera_hora' => 'required',
        ];


        $messages = [
            'primera_vacunado.required' => 'Campo Primera Dosis, es requerido!',
            'primera_farmaceutica.required' => 'Campo Farmacética es requerido!',
            'primera_provincia.required' => 'Campo Provincia es requerido!',
            'primera_ciudad.required' => 'Campo Ciudad es requerido!',
            'primera_puesto.required' => 'Campo Puesto Vacunación es requerido!',
            'primera_equipo.required' => 'Campo Equipo Vacunador es requerido!',
            'primera_fecha.required' => 'Campo Fecha es requerido!',
            'primera_hora.required' => 'Campo Hora es requerido!',
        ];  

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {
            return redirect(route('register_primera', ['id' => $id]))
                            ->withErrors($validator)
                            ->withInput();            
        }

        //dd($request->all());
        //exit(0);
        //die();

        $user = Auth::user();
        //print($user->name);
        //dd($user);
        //exit(0);

        $request->merge(['primera_digitador' => $user->name]);

        $persona = $this->personaRepository->update($request->all(), $id);

        Flash::success('Registrada primera dosis correctamente.');

        return redirect(route('personas.index'));
    }





      /**
     * Show the form for register segunda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function register_segunda($id)
    {
        $persona = $this->personaRepository->find($id);

        $farmaceutica = Catalogo::where('nombre', 'FARMACEUTICA')->first();
        $farmaceuticas = Item::where('catalogos_id', $farmaceutica->id)->pluck('nombre', 'nombre');
        
        $provincia = Catalogo::where('nombre', 'PROVINCIA')->first();
        $provincias = Item::where('catalogos_id', $provincia->id)->pluck('nombre', 'nombre');

        $ciudad = Catalogo::where('nombre', 'CIUDAD')->first();
        $ciudades = Item::where('catalogos_id', $ciudad->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        $equipo = Catalogo::where('nombre', 'PRIMER_EQUIPO_VACUNADOR')->first();
        $equipos = Item::where('catalogos_id', $equipo->id)->pluck('nombre', 'nombre');

        
        //$provincia = Catalogo::find(1);//dd($provincias);
        //exit(0);
        //die();

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        /*return view('personas.edit')->with('persona', $persona);*/
        return view('personas.segunda')->with('persona', $persona)->with('farmaceuticas', $farmaceuticas)->with('provincias', $provincias)->with('ciudades', $ciudades)->with('puestos', $puestos)->with('equipos', $equipos);
    }


     /**
     * Update the specified Persona in storage.
     *
     * @param int $id
     * @param UpdatePrimera $request
     *
     * @return Response
     */
    public function update_segunda($id, UpdatePersonaRequest $request)
    {
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

    
        $rules =  [
            'segunda_vacunado' => 'required',
            'segunda_farmaceutica' => 'required',
            'segunda_provincia' => 'required',
            'segunda_ciudad' => 'required',
            'segunda_puesto' => 'required',
            'segunda_equipo' => 'required',
            'segunda_fecha' => 'required',
            'segunda_hora' => 'required',
        ];


        $messages = [
            'segunda_vacunado.required' => 'Campo Segunda Dosis, es requerido!',
            'segunda_farmaceutica.required' => 'Campo Farmacética es requerido!',
            'segunda_provincia.required' => 'Campo Provincia es requerido!',
            'segunda_ciudad.required' => 'Campo Ciudad es requerido!',
            'segunda_puesto.required' => 'Campo Puesto Vacunación es requerido!',
            'segunda_equipo.required' => 'Campo Equipo Vacunador es requerido!',
            'segunda_fecha.required' => 'Campo Fecha es requerido!',
            'segunda_hora.required' => 'Campo Hora es requerido!',
        ];  

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {
            return redirect(route('register_segunda', ['id' => $id]))
                            ->withErrors($validator)
                            ->withInput();            
        }

        $user = Auth::user();
        $request->merge(['segunda_digitador' => $user->name]);

        $persona = $this->personaRepository->update($request->all(), $id);

        Flash::success('Registrada segunda dosis correctamente.');

        return redirect(route('personas.index'));
    }


}
