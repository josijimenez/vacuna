
<li class="nav-item">
    <a href="{{ route('personas.index') }}"
       class="nav-link {{ Request::is('personas*') ? 'active' : '' }}">
        <p>Personas</p>
    </a>
</li>

 @if(Auth::user()->isAdminOrVaccinator())
  <li class="nav-item">

      <a class="nav-link"
         href="/informe_puesto_vacunacion">
          <p>Reporte Vacunados</p>
      </a>
     

  </li>

@endif

@if(Auth::user()->isAdmin())
  
  <li class="nav-item">
      <a href="{{ route('catalogos.index') }}"
         class="nav-link {{ Request::is('catalogos*') ? 'active' : '' }}">
          <p>Catalogos</p>
      </a>
  </li>

  <li class="nav-item">
      <a href="{{ route('items.index') }}"
         class="nav-link {{ Request::is('items*') ? 'active' : '' }}">
          <p>Items</p>
      </a>
  </li>

  <li class="nav-item">

      <a class="nav-link"
         href="/informe">
          <p>Reporte</p>
      </a>
     
  </li>


  <li class="nav-item">

      <a class="nav-link"
         href="/informe_completo">
          <p>Reporte Completo</p>
      </a>
     

  </li>

  <li class="nav-item">
      <a href="{{ route('dosis.index') }}"
         class="nav-link {{ Request::is('dosis*') ? 'active' : '' }}">
          <p>Dosis</p>
      </a>
  </li>


  </li><li class="nav-item">
      <a href="{{ route('usuarios.index') }}"
         class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
          <p>Usuarios</p>
      </a>
  </li>


  <li class="nav-item">

      <a class="nav-link"
         href="/check">
          <p>Reporte Vacunas</p>
      </a>
     
  </li>


@endif

