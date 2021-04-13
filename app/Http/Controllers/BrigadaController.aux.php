<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrigadaRequest;
use App\Http\Requests\UpdateBrigadaRequest;
use App\Repositories\BrigadaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Punto_vacunacion;

class BrigadaController extends AppBaseController
{
    /** @var  BrigadaRepository */
    private $brigadaRepository;

    public function __construct(BrigadaRepository $brigadaRepo)
    {
        $this->brigadaRepository = $brigadaRepo;
    }

    /**
     * Display a listing of the Brigada.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $brigadas = $this->brigadaRepository->all();

        $puntos = Punto_vacunacion::all()->pluck('nombre', 'id');

        return view('brigadas.index')
            ->with('brigadas', $brigadas)
            ->with('puntos', $puntos);
    }

    /**
     * Show the form for creating a new Brigada.
     *
     * @return Response
     */
    public function create()
    {

        $puntos = Punto_vacunacion::all()->pluck('nombre', 'id');
        return view('brigadas.create')
            ->with('puntos', $puntos);
    }

    /**
     * Store a newly created Brigada in storage.
     *
     * @param CreateBrigadaRequest $request
     *
     * @return Response
     */
    public function store(CreateBrigadaRequest $request)
    {
        $input = $request->all();

        $brigada = $this->brigadaRepository->create($input);

        Flash::success('Brigada saved successfully.');

        return redirect(route('brigadas.index'));
    }

    /**
     * Display the specified Brigada.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $brigada = $this->brigadaRepository->find($id);

        if (empty($brigada)) {
            Flash::error('Brigada not found');

            return redirect(route('brigadas.index'));
        }

        return view('brigadas.show')->with('brigada', $brigada);
    }

    /**
     * Show the form for editing the specified Brigada.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $brigada = $this->brigadaRepository->find($id);

        if (empty($brigada)) {
            Flash::error('Brigada not found');

            return redirect(route('brigadas.index'));
        }

        return view('brigadas.edit')->with('brigada', $brigada);
    }

    /**
     * Update the specified Brigada in storage.
     *
     * @param int $id
     * @param UpdateBrigadaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBrigadaRequest $request)
    {
        $brigada = $this->brigadaRepository->find($id);

        if (empty($brigada)) {
            Flash::error('Brigada not found');

            return redirect(route('brigadas.index'));
        }

        $brigada = $this->brigadaRepository->update($request->all(), $id);

        Flash::success('Brigada updated successfully.');

        return redirect(route('brigadas.index'));
    }

    /**
     * Remove the specified Brigada from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $brigada = $this->brigadaRepository->find($id);

        if (empty($brigada)) {
            Flash::error('Brigada not found');

            return redirect(route('brigadas.index'));
        }

        $this->brigadaRepository->delete($id);

        Flash::success('Brigada deleted successfully.');

        return redirect(route('brigadas.index'));
    }
}
