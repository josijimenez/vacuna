<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDosisRequest;
use App\Http\Requests\UpdateDosisRequest;
use App\Repositories\DosisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
        $dosis = $this->dosisRepository->paginate(10);

        return view('dosis.index')
            ->with('dosis', $dosis);
    }

    /**
     * Show the form for creating a new Dosis.
     *
     * @return Response
     */
    public function create()
    {
        return view('dosis.create');
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
}
