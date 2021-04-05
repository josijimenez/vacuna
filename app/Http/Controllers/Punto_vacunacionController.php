<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePunto_vacunacionRequest;
use App\Http\Requests\UpdatePunto_vacunacionRequest;
use App\Repositories\Punto_vacunacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Punto_vacunacionController extends AppBaseController
{
    /** @var  Punto_vacunacionRepository */
    private $puntoVacunacionRepository;

    public function __construct(Punto_vacunacionRepository $puntoVacunacionRepo)
    {
        $this->puntoVacunacionRepository = $puntoVacunacionRepo;
    }

    /**
     * Display a listing of the Punto_vacunacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $puntoVacunacions = $this->puntoVacunacionRepository->all();

        return view('punto_vacunacions.index')
            ->with('puntoVacunacions', $puntoVacunacions);
    }

    /**
     * Show the form for creating a new Punto_vacunacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('punto_vacunacions.create');
    }

    /**
     * Store a newly created Punto_vacunacion in storage.
     *
     * @param CreatePunto_vacunacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePunto_vacunacionRequest $request)
    {
        $input = $request->all();

        $puntoVacunacion = $this->puntoVacunacionRepository->create($input);

        Flash::success('Punto Vacunacion saved successfully.');

        return redirect(route('puntoVacunacions.index'));
    }

    /**
     * Display the specified Punto_vacunacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $puntoVacunacion = $this->puntoVacunacionRepository->find($id);

        if (empty($puntoVacunacion)) {
            Flash::error('Punto Vacunacion not found');

            return redirect(route('puntoVacunacions.index'));
        }

        return view('punto_vacunacions.show')->with('puntoVacunacion', $puntoVacunacion);
    }

    /**
     * Show the form for editing the specified Punto_vacunacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $puntoVacunacion = $this->puntoVacunacionRepository->find($id);

        if (empty($puntoVacunacion)) {
            Flash::error('Punto Vacunacion not found');

            return redirect(route('puntoVacunacions.index'));
        }

        return view('punto_vacunacions.edit')->with('puntoVacunacion', $puntoVacunacion);
    }

    /**
     * Update the specified Punto_vacunacion in storage.
     *
     * @param int $id
     * @param UpdatePunto_vacunacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePunto_vacunacionRequest $request)
    {
        $puntoVacunacion = $this->puntoVacunacionRepository->find($id);

        if (empty($puntoVacunacion)) {
            Flash::error('Punto Vacunacion not found');

            return redirect(route('puntoVacunacions.index'));
        }

        $puntoVacunacion = $this->puntoVacunacionRepository->update($request->all(), $id);

        Flash::success('Punto Vacunacion updated successfully.');

        return redirect(route('puntoVacunacions.index'));
    }

    /**
     * Remove the specified Punto_vacunacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $puntoVacunacion = $this->puntoVacunacionRepository->find($id);

        if (empty($puntoVacunacion)) {
            Flash::error('Punto Vacunacion not found');

            return redirect(route('puntoVacunacions.index'));
        }

        $this->puntoVacunacionRepository->delete($id);

        Flash::success('Punto Vacunacion deleted successfully.');

        return redirect(route('puntoVacunacions.index'));
    }
}
