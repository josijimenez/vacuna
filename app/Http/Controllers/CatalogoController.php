<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoRequest;
use App\Http\Requests\UpdateCatalogoRequest;
use App\Repositories\CatalogoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatalogoController extends AppBaseController
{
    /** @var  CatalogoRepository */
    private $catalogoRepository;

    public function __construct(CatalogoRepository $catalogoRepo)
    {
        $this->catalogoRepository = $catalogoRepo;
    }

    /**
     * Display a listing of the Catalogo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catalogos = $this->catalogoRepository->all();

        return view('catalogos.index')
            ->with('catalogos', $catalogos);
    }

    /**
     * Show the form for creating a new Catalogo.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogos.create');
    }

    /**
     * Store a newly created Catalogo in storage.
     *
     * @param CreateCatalogoRequest $request
     *
     * @return Response
     */
    public function store(CreateCatalogoRequest $request)
    {
        $input = $request->all();

        $catalogo = $this->catalogoRepository->create($input);

        Flash::success('Catalogo saved successfully.');

        return redirect(route('catalogos.index'));
    }

    /**
     * Display the specified Catalogo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catalogo = $this->catalogoRepository->find($id);

        if (empty($catalogo)) {
            Flash::error('Catalogo not found');

            return redirect(route('catalogos.index'));
        }

        return view('catalogos.show')->with('catalogo', $catalogo);
    }

    /**
     * Show the form for editing the specified Catalogo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catalogo = $this->catalogoRepository->find($id);

        if (empty($catalogo)) {
            Flash::error('Catalogo not found');

            return redirect(route('catalogos.index'));
        }

        return view('catalogos.edit')->with('catalogo', $catalogo);
    }

    /**
     * Update the specified Catalogo in storage.
     *
     * @param int $id
     * @param UpdateCatalogoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatalogoRequest $request)
    {
        $catalogo = $this->catalogoRepository->find($id);

        if (empty($catalogo)) {
            Flash::error('Catalogo not found');

            return redirect(route('catalogos.index'));
        }

        $catalogo = $this->catalogoRepository->update($request->all(), $id);

        Flash::success('Catalogo updated successfully.');

        return redirect(route('catalogos.index'));
    }

    /**
     * Remove the specified Catalogo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catalogo = $this->catalogoRepository->find($id);

        if (empty($catalogo)) {
            Flash::error('Catalogo not found');

            return redirect(route('catalogos.index'));
        }

        $this->catalogoRepository->delete($id);

        Flash::success('Catalogo deleted successfully.');

        return redirect(route('catalogos.index'));
    }
}
