<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIntegranteRequest;
use App\Http\Requests\UpdateIntegranteRequest;
use App\Repositories\IntegranteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Catalogo;
use App\Models\Item;
use App\Models\Brigada;

class IntegranteController extends AppBaseController
{
    /** @var  IntegranteRepository */
    private $integranteRepository;

    public function __construct(IntegranteRepository $integranteRepo)
    {
        $this->integranteRepository = $integranteRepo;
    }

    /**
     * Display a listing of the Integrante.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $integrantes = $this->integranteRepository->all();

        return view('integrantes.index')
            ->with('integrantes', $integrantes);
    }

    /**
     * Show the form for creating a new Integrante.
     *
     * @return Response
     */
    public function create()
    {
        $tipo = Catalogo::where('nombre', 'INTEGRANTE_TIPO')->first();;
        $tipos = Item::where('catalogos_id', $tipo->id)->pluck('nombre', 'nombre');
        return view('integrantes.create')
            ->with('tipos', $tipos);
    }

    /**
     * Store a newly created Integrante in storage.
     *
     * @param CreateIntegranteRequest $request
     *
     * @return Response
     */
    public function store(CreateIntegranteRequest $request)
    {
        $input = $request->all();

        $integrante = $this->integranteRepository->create($input);

        Flash::success('Integrante saved successfully.');

        return redirect(route('integrantes.index'));
    }

    /**
     * Display the specified Integrante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $integrante = $this->integranteRepository->find($id);

        if (empty($integrante)) {
            Flash::error('Integrante not found');

            return redirect(route('integrantes.index'));
        }

        return view('integrantes.show')->with('integrante', $integrante);
    }

    /**
     * Show the form for editing the specified Integrante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $integrante = $this->integranteRepository->find($id);

        if (empty($integrante)) {
            Flash::error('Integrante not found');

            return redirect(route('integrantes.index'));
        }

        $tipo = Catalogo::where('nombre', 'INTEGRANTE_TIPO')->first();
        $tipos = Item::where('catalogos_id', $tipo->id)->pluck('nombre', 'nombre');
        return view('integrantes.edit')->with('integrante', $integrante)
            ->with('tipos', $tipos);
    }

    /**
     * Update the specified Integrante in storage.
     *
     * @param int $id
     * @param UpdateIntegranteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntegranteRequest $request)
    {
        $integrante = $this->integranteRepository->find($id);

        if (empty($integrante)) {
            Flash::error('Integrante not found');

            return redirect(route('integrantes.index'));
        }

        $integrante = $this->integranteRepository->update($request->all(), $id);

        Flash::success('Integrante updated successfully.');

        return redirect(route('integrantes.index'));
    }

    /**
     * Remove the specified Integrante from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $integrante = $this->integranteRepository->find($id);

        if (empty($integrante)) {
            Flash::error('Integrante not found');

            return redirect(route('integrantes.index'));
        }

        $this->integranteRepository->delete($id);

        Flash::success('Integrante deleted successfully.');

        return redirect(route('integrantes.index'));
    }


     /**
     * Display a listing of the Integrante.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function integrantes_brigada($id)
    {

        $brigada = Brigada::find($id);

        if (empty($brigada)) {
            Flash::error('Brigada not found');
            return redirect(route('brigada.index'));
        }


        $integrantes = $this->integranteRepository->all();

        return view('integrantes.create_modal')
            ->with('brigada', $brigada);
    }


}
