<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBiologicoRequest;
use App\Http\Requests\UpdateBiologicoRequest;
use App\Repositories\BiologicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BiologicoController extends AppBaseController
{
    /** @var  BiologicoRepository */
    private $biologicoRepository;

    public function __construct(BiologicoRepository $biologicoRepo)
    {
        $this->biologicoRepository = $biologicoRepo;
    }

    /**
     * Display a listing of the Biologico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $biologicos = $this->biologicoRepository->all();

        return view('biologicos.index')
            ->with('biologicos', $biologicos);
    }

    /**
     * Show the form for creating a new Biologico.
     *
     * @return Response
     */
    public function create()
    {
        return view('biologicos.create');
    }

    /**
     * Store a newly created Biologico in storage.
     *
     * @param CreateBiologicoRequest $request
     *
     * @return Response
     */
    public function store(CreateBiologicoRequest $request)
    {
        $input = $request->all();

        $biologico = $this->biologicoRepository->create($input);

        Flash::success('Biologico saved successfully.');

        return redirect(route('biologicos.index'));
    }

    /**
     * Display the specified Biologico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $biologico = $this->biologicoRepository->find($id);

        if (empty($biologico)) {
            Flash::error('Biologico not found');

            return redirect(route('biologicos.index'));
        }

        return view('biologicos.show')->with('biologico', $biologico);
    }

    /**
     * Show the form for editing the specified Biologico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $biologico = $this->biologicoRepository->find($id);

        if (empty($biologico)) {
            Flash::error('Biologico not found');

            return redirect(route('biologicos.index'));
        }

        return view('biologicos.edit')->with('biologico', $biologico);
    }

    /**
     * Update the specified Biologico in storage.
     *
     * @param int $id
     * @param UpdateBiologicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBiologicoRequest $request)
    {
        $biologico = $this->biologicoRepository->find($id);

        if (empty($biologico)) {
            Flash::error('Biologico not found');

            return redirect(route('biologicos.index'));
        }

        $biologico = $this->biologicoRepository->update($request->all(), $id);

        Flash::success('Biologico updated successfully.');

        return redirect(route('biologicos.index'));
    }

    /**
     * Remove the specified Biologico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $biologico = $this->biologicoRepository->find($id);

        if (empty($biologico)) {
            Flash::error('Biologico not found');

            return redirect(route('biologicos.index'));
        }

        $this->biologicoRepository->delete($id);

        Flash::success('Biologico deleted successfully.');

        return redirect(route('biologicos.index'));
    }
}
