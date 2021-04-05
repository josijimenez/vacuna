<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDosisRequest;
use App\Http\Requests\UpdateDosisRequest;
use App\Repositories\DosisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Dosis;
use App\Models\Catalogo;
use App\Models\Item;

use App\Helpers\Check;

class DosisController extends AppBaseController
{
    /** @var  DosisRepository */
    private $dosisRepository;

    public function __construct(DosisRepository $dosisRepo)
    {
        $this->dosisRepository = $dosisRepo;
    }

    /**
     * Display a listing of the Dosis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        

        $farmaceutica = Catalogo::where('nombre', 'FARMACEUTICA')->first();
        $farmaceuticas = Item::where('catalogos_id', $farmaceutica->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        //$dosis = $this->dosisRepository->paginate(10)->orderBy('fecha', 'asc');

        $query = Dosis::query();

        if ( $request->has('puesto') && trim($request->input('puesto')) !== '' ){
            $query = $query->where('dosis.puesto', 'like', '%' . trim($request->input('puesto')) . '%');
        }

        if ( $request->has('fecha') && trim($request->input('fecha')) !== '' ){
            //$query = $query->orWhere('personas.nombres', 'like', '%' . trim($request->input('nombres')) . '%');
            $query = $query->whereDate('dosis.fecha', trim($request->input('fecha')));

            
        }

        $dosis = $query->select('dosis.*')->distinct()->orderBy('dosis.fecha', 'asc')->paginate(10);

       

        return view('dosis.index')
            ->with('dosis', $dosis)->with('farmaceuticas', $farmaceuticas) ->with('puestos', $puestos);
    }

    /**
     * Show the form for creating a new Dosis.
     *
     * @return Response
     */
    public function create()
    {
        //return view('dosis.create');

        $farmaceutica = Catalogo::where('nombre', 'FARMACEUTICA')->first();
        $farmaceuticas = Item::where('catalogos_id', $farmaceutica->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        return view('dosis.create')
            ->with('farmaceuticas', $farmaceuticas) ->with('puestos', $puestos);
    }

    /**
     * Store a newly created Dosis in storage.
     *
     * @param CreateDosisRequest $request
     *
     * @return Response
     */
    public function store(CreateDosisRequest $request)
    {
        $input = $request->all();

        $dosis = $this->dosisRepository->create($input);

        Flash::success('Dosis saved successfully.');

        return redirect(route('dosis.index'));
    }

    /**
     * Display the specified Dosis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dosis = $this->dosisRepository->find($id);

        if (empty($dosis)) {
            Flash::error('Dosis not found');

            return redirect(route('dosis.index'));
        }

        return view('dosis.show')->with('dosis', $dosis);
    }

    /**
     * Show the form for editing the specified Dosis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dosis = $this->dosisRepository->find($id);

        if (empty($dosis)) {
            Flash::error('Dosis not found');

            return redirect(route('dosis.index'));
        }

        return view('dosis.edit')->with('dosis', $dosis);
    }

    /**
     * Update the specified Dosis in storage.
     *
     * @param int $id
     * @param UpdateDosisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDosisRequest $request)
    {
        $dosis = $this->dosisRepository->find($id);

        if (empty($dosis)) {
            Flash::error('Dosis not found');

            return redirect(route('dosis.index'));
        }

        $dosis = $this->dosisRepository->update($request->all(), $id);

        Flash::success('Dosis updated successfully.');

        return redirect(route('dosis.index'));
    }

    /**
     * Remove the specified Dosis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dosis = $this->dosisRepository->find($id);

        if (empty($dosis)) {
            Flash::error('Dosis not found');

            return redirect(route('dosis.index'));
        }

        $this->dosisRepository->delete($id);

        Flash::success('Dosis deleted successfully.');

        return redirect(route('dosis.index'));
    }



    /**
     * Display a listing of the Dosis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function check(Request $request)
    {
        

        $farmaceutica = Catalogo::where('nombre', 'FARMACEUTICA')->first();
        $farmaceuticas = Item::where('catalogos_id', $farmaceutica->id)->pluck('nombre', 'nombre');

        $puesto = Catalogo::where('nombre', 'PUESTO_VACUNACION')->first();
        $puestos = Item::where('catalogos_id', $puesto->id)->pluck('nombre', 'nombre');

        //$dosis = $this->dosisRepository->paginate(10)->orderBy('fecha', 'asc');

        $query = Dosis::query();

        $puesto = null;
        $fecha = null;

        if ( $request->has('puesto') && trim($request->input('puesto')) !== '' ){
            $query = $query->where('dosis.puesto', 'like', '%' . trim($request->input('puesto')) . '%');
            $puesto =  trim($request->input('puesto'));
        }

        if ( $request->has('fecha') && trim($request->input('fecha')) !== '' ){
            //$query = $query->orWhere('personas.nombres', 'like', '%' . trim($request->input('nombres')) . '%');
            $query = $query->whereDate('dosis.fecha', trim($request->input('fecha')));
            $fecha =  trim($request->input('fecha'));
            
        }


        //dd($farmaceuticas);
        //exit(0);

       // $dosis_entregadas = array();
       // foreach ($farmaceuticas as $farmaceutica) { 
        //    $amount =$query->where('dosis.farmaceutica', '=', $farmaceutica)->count();
         //   $check = new Check($farmaceutica,  $amount);
         //   array_push($dosis_entregadas, $check);
        //}

        
        $dosis_entregadas =  Check::dosisEntregadas($puesto, $fecha, $farmaceuticas);

        //dd($dosis_entregadas);
        //exit(0);

        $personas_vacunadas =  Check::personasVacundas($puesto, $fecha, $farmaceuticas);

        /*
        $personas_vacunadas = array();     
        foreach ($farmaceuticas as $farmaceutica) { 
            $amount =$query->where('dosis.farmaceutica', '=', $farmaceutica)->count();
            $check = new Check($farmaceutica,  $amount);
            array_push($personas_vacunadas, $check);
        }
        */

        $consolidados = array();

        foreach ($farmaceuticas as $farmaceutica) { 
           // $query = $query->where('dosis.farmaceutica', '=', $farmaceutica);
          

            $amount_dosis_entregadas = 0;
            foreach ($dosis_entregadas as $var){
                    if ($var->name == $farmaceutica){
                     $amount_dosis_entregadas = $var->amount;
                    }
             }

            $amount_personas_vacunadas = 0;
            foreach ($personas_vacunadas as $var){
                    if ($var->name == $farmaceutica){
                         $amount_personas_vacunadas = $var->amount;
                    }
             }

            $amount =  $amount_dosis_entregadas -  $amount_personas_vacunadas;
            
            $check = new Check($farmaceutica,  $amount);
            array_push($consolidados, $check);


        }


        //$num_registros = $query->distinct()->count();
        //$dosis = $query->select('dosis.*')->distinct()->orderBy('dosis.fecha', 'asc')->paginate(10);
    

        return view('dosis.check')
            ->with('dosis_entregadas', $dosis_entregadas)
            ->with('personas_vacunadas', $personas_vacunadas)
            ->with('consolidados', $consolidados)
            ->with('farmaceuticas', $farmaceuticas)
            ->with('puestos', $puestos);
    }





}
