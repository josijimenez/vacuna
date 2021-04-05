@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar usuario</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                   
                    <!-- Puesto Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'Nombre:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>

                    <!-- Institucion Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('type', 'Tipo:') !!}
                        {!! Form::select('type', $tipos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                    <!-- Puesto Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('puesto_vacunacion', 'Puesto vacunación:') !!}
                        {!! Form::select('puesto_vacunacion', $puestos, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>

                     <!-- Institucion Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('institucion', 'Institución:') !!}
                        {!! Form::select('institucion', $instituciones, null, ['class' => 'form-control', 'placeholder' => '--------------------']) !!}
                    </div>


                </div>


                    <div class="pw-change-container" style="display:none">
                        
                        <div class="row">

                            <div class="form-group col-sm-6">
                                {!! Form::label('password', 'Password:') !!}
                                <input type="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password">
                                @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                {!! Form::label('password_confirmation', 'Repita el Password:') !!}
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       placeholder="Retype password">

                            </div>

                        </div>
                                
                    </div>

                    <div class="col-12 col-sm-6 mb-2">
                            <a href="#" class="btn btn-outline-secondary btn-block btn-change-pw mt-3" title="{!! trans('laravelusers::forms.change-pw') !!}">
                                <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                                <span></span> {!! trans('laravelusers::forms.change-pw') !!}
                            </a>
                        </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection



@section('scripts')
    
    <script type="text/javascript">
      $(document).ready(function() {

          $('.btn-change-pw').click(function(event) {
            event.preventDefault();
            $('.pw-change-container').slideToggle(100);
            $(this).find('.fa').toggleClass('fa-times');
            $(this).find('.fa').toggleClass('fa-lock');
            $(this).find('span').toggleText('', '<?php echo trans("laravelusers::forms.cancel"); ?>');
          });

      });

    </script>

    @parent
@stop