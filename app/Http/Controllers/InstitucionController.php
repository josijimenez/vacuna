<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstitucionRequest;
use App\Http\Requests\UpdateInstitucionRequest;
use App\Repositories\InstitucionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InstitucionController extends AppBaseController
{
    /** @var  InstitucionRepository */
    private $institucionRepository;

    public function __construct(InstitucionRepository $institucionRepo)
    {
        $this->institucionRepository = $institucionRepo;
    }

    /**
     * Display a listing of the Institucion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $institucions = $this->institucionRepository->all();

        return view('institucions.index')
            ->with('institucions', $institucions);
    }

    /**
     * Show the form for creating a new Institucion.
     *
     * @return Response
     */
    public function create()
    {
        return view('institucions.create');
    }

    /**
     * Store a newly created Institucion in storage.
     *
     * @param CreateInstitucionRequest $request
     *
     * @return Response
     */
    public function store(CreateInstitucionRequest $request)
    {
        $input = $request->all();

        $institucion = $this->institucionRepository->create($input);

        Flash::success('Institucion saved successfully.');

        return redirect(route('institucions.index'));
    }

    /**
     * Display the specified Institucion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $institucion = $this->institucionRepository->find($id);

        if (empty($institucion)) {
            Flash::error('Institucion not found');

            return redirect(route('institucions.index'));
        }

        return view('institucions.show')->with('institucion', $institucion);
    }

    /**
     * Show the form for editing the specified Institucion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $institucion = $this->institucionRepository->find($id);

        if (empty($institucion)) {
            Flash::error('Institucion not found');

            return redirect(route('institucions.index'));
        }

        return view('institucions.edit')->with('institucion', $institucion);
    }

    /**
     * Update the specified Institucion in storage.
     *
     * @param int $id
     * @param UpdateInstitucionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstitucionRequest $request)
    {
        $institucion = $this->institucionRepository->find($id);

        if (empty($institucion)) {
            Flash::error('Institucion not found');

            return redirect(route('institucions.index'));
        }

        $institucion = $this->institucionRepository->update($request->all(), $id);

        Flash::success('Institucion updated successfully.');

        return redirect(route('institucions.index'));
    }

    /**
     * Remove the specified Institucion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $institucion = $this->institucionRepository->find($id);

        if (empty($institucion)) {
            Flash::error('Institucion not found');

            return redirect(route('institucions.index'));
        }

        $this->institucionRepository->delete($id);

        Flash::success('Institucion deleted successfully.');

        return redirect(route('institucions.index'));
    }
}
