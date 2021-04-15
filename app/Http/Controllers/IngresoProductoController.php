<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIngresoProductoRequest;
use App\Http\Requests\UpdateIngresoProductoRequest;
use App\Repositories\IngresoProductoRepository;
use App\Http\Requests\CreateStockDisponibleRequest;
use App\Http\Requests\UpdateStockDisponibleRequest;
use App\Repositories\StockDisponibleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

use App\Models\Biologico;
use App\Models\Institucion;
use App\Models\IngresoDetalle;
use App\Models\StockDisponible;
use Illuminate\Support\Facades\Auth;
class IngresoProductoController extends AppBaseController
{
    /** @var  IngresoProductoRepository */
    private $ingresoProductoRepository;
    private $stockDisponibleRepository;
    
    public function __construct(IngresoProductoRepository $ingresoProductoRepo, 
                                StockDisponibleRepository $stockDisponibleRepo
                                )
    {
        $this->ingresoProductoRepository = $ingresoProductoRepo;
        $this->stockDisponibleRepository = $stockDisponibleRepo;
        
    }

    /**
     * Display a listing of the IngresoProducto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ingresoProductos = $this->ingresoProductoRepository->all();


            return view('ingreso_productos.index')
            ->with('ingresoProductos', $ingresoProductos);
    }

    /**
     * Show the form for creating a new IngresoProducto.
     *
     * @return Response
     */
    public function create()
    {
        $instituciones = Institucion::all()->pluck('nombre','nombre');;
       
       


        $lote = Biologico::all()->pluck('lote','lote');;
        $id_ingreso_detalle = IngresoDetalle::all()->pluck('id','id');;
       
        return view('ingreso_productos.create')
             ->with('lote', $lote) 
             ->with('id_ingreso_detalle', $id_ingreso_detalle) 
             ->with('instituciones', $instituciones)
             ;
        //return view('ingreso_productos.create');
    }

    /**
     * Store a newly created IngresoProducto in storage.
     *
     * @param CreateIngresoProductoRequest $request
     * @param CreateStockDisponibleRequest $requeststockdisponible
     * @return Response
     */
    public function store(CreateIngresoProductoRequest $request)
    {
        
        $input = $request->all();
        $user = Auth::user();
        $request->merge(['usuario' => $user->name]);
        $input = $request->all();

       
        
       
        $stockDisponible = DB::select('select * from stock_disponibles where lote = ? and institucion = ?',[$request->input('lote'),$request->input('institucion')]);
       
        //$stockDisponible = DB::select('select * from stock_disponibles where lote = ?',[$request->input('lote')]);
        //$institucion = DB::select('select * from stock_disponibles where institucion = ?',[$request->input('institucion')]);
        //$stockDisponible = $this->stockDisponibleRepository->find($request->input('lote'));
        //$institucion = $this->stockDisponibleRepository->find($request->input('institucion'));
        //print_r(count($stockDisponible ));
        //print_r($institucion);
        //exit;
        if (count($stockDisponible) == 0 ) {
            $lote = $request->input('lote');
            $cantidad = $request->input('cantidad');
            $institucion = $request->input('institucion');

            $student = new StockDisponible;
            $student->lote = $lote;
            $student->cantidad_actual = $cantidad;
            $student->institucion =  $institucion;

            
            $student->save();
          
        }else
        {
            $cantidad_actual_stock = intval($stockDisponible[0]->cantidad_actual)+intval($request->input('cantidad'));
            DB::update('update stock_disponibles set cantidad_actual = ? where lote = ?',[$cantidad_actual_stock,$request->input('lote')]);
           // print_r($cantidad_actual_stock);
            //exit;
        }
        $ingresoProducto = $this->ingresoProductoRepository->create($input);
        //return view('stock_disponibles.show')->with('stockDisponible', $stockDisponible);

        Flash::success('Ingreso Producto saved successfully.');
        return redirect(route('ingresoProductos.index'));
    }

    /**
     * Display the specified IngresoProducto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ingresoProducto = $this->ingresoProductoRepository->find($id);

        if (empty($ingresoProducto)) {
            Flash::error('Ingreso Producto not found');

            return redirect(route('ingresoProductos.index'));
        }

        return view('ingreso_productos.show')->with('ingresoProducto', $ingresoProducto);
    }

    /**
     * Show the form for editing the specified IngresoProducto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ingresoProducto = $this->ingresoProductoRepository->find($id);
       
        $instituciones = Institucion::all()->pluck('nombre','nombre');;
        $lote = Biologico::all()->pluck('lote','lote');;
        $id_ingreso_detalle = IngresoDetalle::all()->pluck('id','id');;

        if (empty($ingresoProducto)) {
            Flash::error('Ingreso Producto not found');

            return redirect(route('ingresoProductos.index'));
        }

        return view('ingreso_productos.edit')
        ->with('lote', $lote) 
             ->with('id_ingreso_detalle', $id_ingreso_detalle) 
             ->with('instituciones', $instituciones)
        ->with('ingresoProducto', $ingresoProducto);
    }

    /**
     * Update the specified IngresoProducto in storage.
     *
     * @param int $id
     * @param UpdateIngresoProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIngresoProductoRequest $request)
    {
        $ingresoProducto = $this->ingresoProductoRepository->find($id);


      

        if (empty($ingresoProducto)) {
            Flash::error('Ingreso Producto not found');

            return redirect(route('ingresoProductos.index'));
        }

        $ingresoProducto = $this->ingresoProductoRepository->update($request->all(), $id);

        Flash::success('Ingreso Producto updated successfully.');

        return redirect(route('ingresoProductos.index'));
    }

    /**
     * Remove the specified IngresoProducto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ingresoProducto = $this->ingresoProductoRepository->find($id);

        if (empty($ingresoProducto)) {
            Flash::error('Ingreso Producto not found');

            return redirect(route('ingresoProductos.index'));
        }

        $this->ingresoProductoRepository->delete($id);

        Flash::success('Ingreso Producto deleted successfully.');

        return redirect(route('ingresoProductos.index'));
    }

    public function buscarinstitucion($id_ingreso_detalle, Request $request){

        //print_r($cedula);
        //exit(0);

        //print_r($cedula);
        //exit(0);
        $ingresoDetalle = $this->ingresoDetalleRepository->find($id_ingreso_detalle);
        //$ingresoProducto = $this->ingresoProductoRepository->find($id);
        //$institucion = $ingresoDetalle.[id_institucion];
        print_r($ingresoDetalle);
        //print_r($institucion);
        exit;
        $hoy = date("d-m-Y"); 

        //$response = Http::post('https://coresalud.msp.gob.ec/coresalud/app.php/publico/rpis/afiliacion/consultafiliacion/1104517493/17-03-2021');
        $response = Http::post('https://coresalud.msp.gob.ec/coresalud/app.php/publico/rpis/afiliacion/consultafiliacion/' . $cedula . '/' . $hoy  );
        
        $cadena = $response->body();

        $tuArray = array();
        $tuArray = explode("\n", $cadena);

        $nombre = null;
        $fecha_nacimiento = null;

        foreach($tuArray as  $indice => $palabra){
            
            if($indice == 6){
                $nombre = $palabra;
                continue;
            }
            if($indice == 10){
                 $fecha_nacimiento = $palabra;
                 break;
            }
          
        }  


        $parte1 = explode('<span class="label label-success">',$nombre);
        $parte2 = explode('</span>',$parte1[1]);
        $nombre = $parte2[0];

        
        if(empty($nombre)){
            //print_r("Algo es mal...");
            //exit(0);
            return Response::json([], 400);
           

        } else {

            $parte1=explode('<span class="label label-success">Fecha Nacimiento: ',$fecha_nacimiento);
            $parte2=explode('</span>',$parte1[1]);
            $fecha_nacimiento = $parte2[0];

            //print_r($nombre . $fecha_nacimiento);
            //exit(0);

            $data = [];
            array_push($data, $nombre);
            array_push($data, $fecha_nacimiento);

            //$fecha_nacimiento = date("Y-m-d", strtotime($fecha_nacimiento));
            //$date = date_create($fecha_nacimiento);
            //$fecha_nacimiento = date_format($date,"Y-m-d");
            //$date = new DateTime($fecha_nacimiento);
            //$fecha_nacimiento = $date->format('Y-m-d'); // 18-11-2016

            //fecha_nacimiento    "10/06/1986"
            $myDateTime = DateTime::createFromFormat('d/m/Y', $fecha_nacimiento);
            $fecha_nacimiento = $myDateTime->format('Y-m-d');

            $persona = array('nombre'=> $nombre, 'fecha_nacimiento'=> $fecha_nacimiento);
            //return response()->json($data);

            //print_r($data);
            //exit(0);
       

           

            $msg = "This is a simple message.";
            //return response()->json(array('msg'=> $msg), 200);
            return Response::json($persona, 200);

        }

     


    }
}
