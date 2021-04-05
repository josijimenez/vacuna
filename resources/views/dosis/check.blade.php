@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            

        <div class="panel-group">
            <div class="panel panel-default">

                {!! Form::open(array('url' => URL::current(), 'method' => 'GET', 'class' => "form-horizontal", 'role' => "form", 'style' => "padding:10px;")) !!}

                <!-- Meeting Date Field -->
               <div class="row">

                        <!-- Puesto Vacunacion Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('puesto', 'Puesto Vacunacion:') !!}
                            {!! Form::select('puesto', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                        </div>

                        <!-- Fecha Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('fecha', 'Fecha:') !!}
                            {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#fecha').datetimepicker({
                                    format: 'YYYY-MM-DD',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                </div>
                              
                <!-- Submit Field -->
                <div class="form-group">
                <div class="col-sm-12">
                   
                   <button class="btn btn-primary" type="reset"> <i class="fas fa-eraser"></i></button>
                   <button class='btn btn-primary' type='submit' value='submit'> <i class='fas fa-search'> </i> </button>
                </div>
                
                </div>

              {!! Form::close() !!}
          </div>
        
        </div>


					<div class="row mb-2">
		                <div class="col-sm-6">
		                    <h1>Reporte:</h1>
		                </div>
		  
		            </div>


		<div class="panel-group">

            <div class="card">


				<div class="card-body">

					<h6 class="card-subtitle mb-2 text-muted">Dosis entregadas:</h6>
				
						<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
						
							   @foreach($dosis_entregadas as $check)
						           
									<li class="nav-item">
										<div class="info-box bg-gradient-warning">
										  <span class="info-box-icon"><i class="far fa-copy"></i></span>
										  <div class="info-box-content">
										    <span class="info-box-text">{{ $check->name }}</span>
										    <span class="info-box-number">{{ $check->amount }}</span>
										  </div>
										</div>
									</li>

						        @endforeach

						</nav>
				</div>
			</div>



			<div class="card">


				<div class="card-body">

		        <h6 class="card-subtitle mb-2 text-muted">Personas Vacunadas:</h6>
				
					<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
						
							   @foreach($personas_vacunadas as $check)
						           
									<li class="nav-item">
										<div class="info-box bg-gradient-warning">
										  <span class="info-box-icon"><i class="far fa-copy"></i></span>
										  <div class="info-box-content">
										    <span class="info-box-text">{{ $check->name }}</span>
										    <span class="info-box-number">{{ $check->amount }}</span>
										  </div>
										</div>
									</li>

						        @endforeach

						</nav>

				</div>
			</div>

			

			<div class="card">


				<div class="card-body">

		        <h6 class="card-subtitle mb-2 text-muted">Consolidado:</h6>
				
							<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
						
							   @foreach($consolidados as $check)
						           
									<li class="nav-item">
										<div class="info-box bg-gradient-warning">
										  <span class="info-box-icon"><i class="far fa-copy"></i></span>
										  <div class="info-box-content">
										    <span class="info-box-text">{{ $check->name }}</span>
										    <span class="info-box-number">{{ $check->amount }}</span>
										  </div>
										</div>
									</li>

						        @endforeach

						</nav>

				</div>
			</div>


		</div>


        </div>

    </section>

@endsection

