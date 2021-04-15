<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIngresoDetalleRequest;
use App\Http\Requests\UpdateIngresoDetalleRequest;
use App\Repositories\IngresoDetalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;

use App\Models\Catalogo;
use App\Models\Item;
use App\Models\Institucion;
use Illuminate\Support\Facades\Auth;

class IngresoDetalleController extends AppBaseController
{
    /** @var  IngresoDetalleRepository */
    private $ingresoDetalleRepository;

    public function __construct(IngresoDetalleRepository $ingresoDetalleRepo)
    {
        $this->ingresoDetalleRepository = $ingresoDetalleRepo;
    }

    /**
     * Display a listing of the IngresoDetalle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ingresoDetalles = $this->ingresoDetalleRepository->all();

        return view('ingreso_detalles.index')
            ->with('ingresoDetalles', $ingresoDetalles);
    }

    /**
     * Show the form for creating a new IngresoDetalle.
     *
     * @return Response
     */
    public function create()
    {
        //return view('ingreso_detalles.create');

        $instituciones = Institucion::all()->pluck('nombre','nombre');;
       
        return view('ingreso_detalles.create')
             ->with('instituciones', $instituciones) ;
    }

    /**
     * Store a newly created IngresoDetalle in storage.
     *
     * @param CreateIngresoDetalleRequest $request
     *
     * @return Response
     */
    public function store(CreateIngresoDetalleRequest $request)
    {
        $input = $request->all();
        //print_r($input);
        //exit;

        $rules = [
            'numero_comprobante' => 'required',
            'fecha_emision' => 'required',
            'subtotal' => 'required',
            'iva' => 'required',
            'total' => 'required',
            'id_institucion' => 'required',
            'recibidoconforme' => 'required',
            'puestorecibidoconforme' => 'required',
            'entregadoconforme' => 'required',
            'puestoentregadoconforme' => 'required'
        ];

        $messages = [
            'numero_comprobante.required' => 'Campo numero de comprobante, es requerido',
            'fecha_emision.required' => 'Campo Fecha de emision, es requerido',
            'subtotal.required' => 'Campo Subtotal, es requerido',
            'iva.required' => 'Campo Iva, es requerido',
            'total.required' => 'Campo total, es requerido',
            'id_institucion.required' => 'Campo Bodega de Ingreso, es requerido',
            'recibidoconforme.required' => 'Campo Recibido Conforme, es requerido',
            'puestorecibidoconforme.required' => 'Campo Puesto de Requerido Conforme, es requerido',
            'entregadoconforme.required' => 'Campo de Entregado Conforme, es requerido',
            'puestoentregadoconforme.required' => 'Campo de Puesto de Entregado Conforme, es requerido'
        ];
        

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {
            return redirect(route('ingreso_detalles.create'))
                            ->withErrors($validator)
                            ->withInput();            
        }





        $user = Auth::user();
        $request->merge(['usuario' => $user->name]);
        $input = $request->all();
        
        $ingresoDetalle = $this->ingresoDetalleRepository->create($input);

        Flash::success('Ingreso Detalle saved successfully.');

        return redirect(route('ingresoDetalles.index'));
    }

    /**
     * Display the specified IngresoDetalle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ingresoDetalle = $this->ingresoDetalleRepository->find($id);

        if (empty($ingresoDetalle)) {
            Flash::error('Ingreso Detalle not found');

            return redirect(route('ingresoDetalles.index'));
        }

        return view('ingreso_detalles.show')->with('ingresoDetalle', $ingresoDetalle);
    }

    /**
     * Show the form for editing the specified IngresoDetalle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ingresoDetalle = $this->ingresoDetalleRepository->find($id);

        if (empty($ingresoDetalle)) {
            Flash::error('Ingreso Detalle not found');

            return redirect(route('ingresoDetalles.index'));
        }
        $instituciones = Institucion::all()->pluck('nombre','nombre');;
       
        /*return view('ingreso_detalles.create')
             ->with('instituciones', $instituciones) ;*/
        return view('ingreso_detalles.edit')->with('ingresoDetalle', $ingresoDetalle)->with('instituciones', $instituciones);
    }

    /**
     * Update the specified IngresoDetalle in storage.
     *
     * @param int $id
     * @param UpdateIngresoDetalleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIngresoDetalleRequest $request)
    {
        $ingresoDetalle = $this->ingresoDetalleRepository->find($id);

        if (empty($ingresoDetalle)) {
            Flash::error('Ingreso Detalle not found');

            return redirect(route('ingresoDetalles.index'));
        }

        $ingresoDetalle = $this->ingresoDetalleRepository->update($request->all(), $id);

        Flash::success('Ingreso Detalle updated successfully.');

        return redirect(route('ingresoDetalles.index'));
    }

    /**
     * Remove the specified IngresoDetalle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ingresoDetalle = $this->ingresoDetalleRepository->find($id);

        if (empty($ingresoDetalle)) {
            Flash::error('Ingreso Detalle not found');

            return redirect(route('ingresoDetalles.index'));
        }

        $this->ingresoDetalleRepository->delete($id);

        Flash::success('Ingreso Detalle deleted successfully.');

        return redirect(route('ingresoDetalles.index'));
    }
}
