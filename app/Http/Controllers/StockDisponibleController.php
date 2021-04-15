<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockDisponibleRequest;
use App\Http\Requests\UpdateStockDisponibleRequest;
use App\Repositories\StockDisponibleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Institucion;
use App\Models\StockDisponible;
use App\Models\EgresoProducto;
use DB;
use Illuminate\Support\Facades\Auth;
class StockDisponibleController extends AppBaseController
{
    /** @var  StockDisponibleRepository */
    private $stockDisponibleRepository;

    public function __construct(StockDisponibleRepository $stockDisponibleRepo)
    {
        $this->stockDisponibleRepository = $stockDisponibleRepo;
    }

    /**
     * Display a listing of the StockDisponible.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockDisponibles = $this->stockDisponibleRepository->all();

        return view('stock_disponibles.index')
            ->with('stockDisponibles', $stockDisponibles);
    }

    /**
     * Show the form for creating a new StockDisponible.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_disponibles.create');
    }

    /**
     * Store a newly created StockDisponible in storage.
     *
     * @param CreateStockDisponibleRequest $request
     *
     * @return Response
     */
    public function store(CreateStockDisponibleRequest $request)
    {
        $input = $request->all();

        $stockDisponible = $this->stockDisponibleRepository->create($input);

        Flash::success('Stock Disponible saved successfully.');

        return redirect(route('stockDisponibles.index'));
    }

    /**
     * Display the specified StockDisponible.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockDisponible = $this->stockDisponibleRepository->find($id);

        if (empty($stockDisponible)) {
            Flash::error('Stock Disponible not found');

            return redirect(route('stockDisponibles.index'));
        }

        return view('stock_disponibles.show')->with('stockDisponible', $stockDisponible);
    }

    /**
     * Show the form for editing the specified StockDisponible.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockDisponible = $this->stockDisponibleRepository->find($id);
        $instituciones = Institucion::all()->pluck('nombre','nombre');
        if (empty($stockDisponible)) {
            Flash::error('Stock Disponible not found');

            return redirect(route('stockDisponibles.index'));
        }

        return view('stock_disponibles.edit')
        ->with('stockDisponible', $stockDisponible)
        ->with('instituciones', $instituciones);
    }

    /**
     * Update the specified StockDisponible in storage.
     *
     * @param int $id
     * @param UpdateStockDisponibleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockDisponibleRequest $request)
    {
        $stockDisponible = $this->stockDisponibleRepository->find($id);
        $lote = $request->input('lote');
        $cantidad_actual = intval($request->input('cantidad_actual'));
        $cantidad_enviar = intval($request->input('cantidad_enviar'));
        $institucion_origen = $request->input('institucion');
        $institucion_enviar = $request->input('institucion_enviar');
        if ($cantidad_enviar > $cantidad_actual || $institucion_origen == $institucion_enviar) {
            Flash::error('Cantidad de Dosis no Disponible para Enviar');
            return redirect(route('stockDisponibles.index'));
        }
        else{
            $stockDisponible = DB::select('select * from stock_disponibles where lote = ? and institucion = ?',[$request->input('lote'),$institucion_enviar]);
           //print_r($stockDisponible);
           //exit;

            if (empty($stockDisponible)) {
                $stock = new StockDisponible;
                $stock->lote = $lote;
                $stock->cantidad_actual = $cantidad_enviar;
                $stock->institucion =  $institucion_enviar;
                $stock->save();
                //Tabla Egreso
                $user = Auth::user();
                $egreso = new EgresoProducto;
                $egreso->cantidad = $cantidad_enviar;
                $egreso->lote = $lote;
                $egreso->institucion = $institucion_enviar;
                $egreso->usuario = $user->name;
                $egreso->save();

                $cantidad_actual_stock1 = $cantidad_actual-$cantidad_enviar;
                DB::update('update stock_disponibles set cantidad_actual = ? where lote = ? and institucion = ?',[$cantidad_actual_stock1,$request->input('lote'),$institucion_origen]);
                if($cantidad_actual_stock1 <= 0)
                {
                    DB::delete('delete from stock_disponibles where cantidad_actual = 0 ');
                }
            }else
            {

                $user = Auth::user();
                $egreso = new EgresoProducto;
                $egreso->cantidad = $cantidad_enviar;
                $egreso->lote = $lote;
                $egreso->institucion = $institucion_enviar;
                $egreso->usuario = $user->name;
                $egreso->save();
                $cantidad_actual_stock = intval($stockDisponible[0]->cantidad_actual)+intval($cantidad_enviar);
                DB::update('update stock_disponibles set cantidad_actual = ? where lote = ? and institucion = ?',[$cantidad_actual_stock,$request->input('lote'),$institucion_enviar]);
                $cantidad_actual_stock1 = $cantidad_actual-$cantidad_enviar;
                DB::update('update stock_disponibles set cantidad_actual = ? where lote = ? and institucion = ?',[$cantidad_actual_stock1,$lote,$institucion_origen]);
                if($cantidad_actual_stock1 <= 0)
                {
                    DB::delete('delete from stock_disponibles where cantidad_actual = 0 ');
                }
                // print_r($cantidad_actual_stock);
                //exit;
            }



        }
        /*print_r($lote);
        print_r($cantidad_actual);
        print_r($cantidad_enviar);
        print_r($institucion_enviar);
        exit;
        */

        //$stockDisponible = $this->stockDisponibleRepository->update($request->all(), $id);

        Flash::success('Stock Disponible updated successfully.');

        return redirect(route('stockDisponibles.index'));
    }

    /**
     * Remove the specified StockDisponible from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockDisponible = $this->stockDisponibleRepository->find($id);

        if (empty($stockDisponible)) {
            Flash::error('Stock Disponible not found');

            return redirect(route('stockDisponibles.index'));
        }

        $this->stockDisponibleRepository->delete($id);

        Flash::success('Stock Disponible deleted successfully.');

        return redirect(route('stockDisponibles.index'));
    }
}
