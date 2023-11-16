<div class="container-fluid container-header-logo-menu">
	<nav class="transparent container z-depth-0">
		<div class="nav-wrapper">
			<a href="/home" class="brand-logo container-logo">
				<img src="{{ url('images/logo/logo_header2.png') }}" alt="" width="146">
			</a>
			<a href="#" data-target="nav-mobile-portal" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="{{route('portal.socio')}}">PAINEL</a></li>
				{{-- <li><a href="{{route('portal.socio.perfil')}}">PERFIL</a></li>
				<li><a href="{{route('portal.socio.financeiro')}}">FINANCEIRO</a></li>
				<li><a href="{{route('portal.socio.indique')}}">INDIQUE</a></li> --}}
				{{-- <li><a href="{{route('portal.socio.termo')}}">TERMOS E CONDICOES</a></li> --}}

				<li style="border-left:1px solid #fff;">
					<a class="dropdown-trigger" data-target='dropdown1'>
						{{-- <i class="material-icons left">contacts</i> --}}
						<i class="material-icons left">account_circle</i>

						<i class="material-icons right">expand_more</i>
						{{ Auth::user()->name }}
					</a>
				</li>
				<!-- <li routerLinkActive="active"><a [routerLink]="['/contatos']" class="btn btn-primary btn-conta orange darken-4">CONTATOS</a></li> -->
				{{-- <button class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</button> --}}

				<!-- Dropdown Trigger -->
				{{-- <button class='dropdown-trigger btn btn-primary btn-conta orange darken-4 btn-arredondado' href='#' data-target='dropdown1'>
					<i class="material-icons right">expand_more</i>
					{{ Auth::user()->name }}
				</button> --}}

				<!-- Dropdown Structure -->
				<ul id='dropdown1' class='dropdown-content'>
					<li><a href="#!"><i class="material-icons left">person</i>Perfil</a></li>
					<li class="divider" tabindex="-1"></li>
					<li>
						{{-- <a href="#!">Sair</a> --}}

						<a class="dropdown-item" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
										 <i class="material-icons left">exit_to_app</i>

							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
			</ul>
		</div>
	</nav>

	<ul class="sidenav" id="nav-mobile-portal">

		<li>
			<div class="user-view">
				<div class="background">
					{{-- <img src="images/office.jpg"> --}}
				</div>
				<a href="#user">
					{{-- <img class="circle" src="images/yuna.jpg"> --}}
				</a>
				<a href="#name"><span class="white-text name">John Doe</span></a>
				<a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
			</div>
		</li>

		<li><a href="{{route('portal.socio')}}">PAINEL</a></li>
		{{-- <li><a href="{{route('portal.socio')}}">PERFIL</a></li>
		<li><a href="{{route('portal.socio')}}">FINANCEIRO</a></li>
		<li><a href="{{route('portal.socio')}}">INDIQUE</a></li>
		<li><a href="{{route('portal.socio')}}">TERMOS E CONDICOES</a></li> --}}
	</ul>

</div>

<!-- SCRIPTS JS  -->
@section('scripts')



@endsection
