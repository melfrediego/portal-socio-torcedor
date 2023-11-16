<div class="container-fluid container-header-logo-menu">
		<nav class="transparent container z-depth-0">
			<div class="nav-wrapper">
				<a href="/" class="brand-logo container-logo img-responsive">
					<img src="{{ url('images/logo/logo_header2.png') }}" alt="" width="180">
				</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="/">HOME</a></li>
					<li><a href="{{route('programa')}}">O PROGRAMA</a></li>
					{{-- <li><a href="{{route('planos')}}">PLANOS</a></li> --}}
					{{-- <li><a href="{{route('faqs')}}">FAQ</a></li> --}}
					<li><a href="{{route('contatos')}}">CONTATOS</a></li>
					{{-- <li style="border-left: 1px solid #fff;"><a class="" href="/portal-socio"><i class="material-icons right">expand_more</i> ACESSAR MINHA CONTA</a></li> --}}
					<!-- <li routerLinkActive="active"><a [routerLink]="['/contatos']" class="btn btn-primary btn-conta orange darken-4">CONTATOS</a></li> -->
					{{-- <a class="btn btn-primary btn-conta orange darken-4 btn-arredondado" href="/portal-socio">ACESSAR MINHA CONTA</a> --}}
					<button id="btn_acessar_conta" class="btn btn-primary btn-conta blask darken-4 btn-arredondado">
						{{-- check --}}
						<i class="material-icons left icon-acesso">account_circle</i>
						ACESSAR MINHA CONTA
					</button>
					<!-- <img width="40" src="../../../assets/images/perfil/img01.jpg" alt="" class="circle responsive-img imagem-user-header"> -->
				</ul>
			</div>
		</nav>

	<ul class="sidenav" id="mobile-demo">

		<li>
			<div class="user-view">
				<div class="background">
					<img src="images/office.jpg">
				</div>
				<a href="#user"><img class="circle" src="images/yuna.jpg"></a>
				<a href="#name"><span class="white-text name">John Doe</span></a>
				<a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
			</div>
		</li>

		<li><a href="/">HOME</a></li>
		<li><a href="{{route('programa')}}">O PROGRAMA</a></li>
		{{-- <li><a href="{{route('planos')}}">PLANOS</a></li> --}}
		<li><a href="{{route('faqs')}}">FAQ</a></li>
		<li><a href="{{route('contatos')}}">CONTATOS</a></li>
		<!-- <li routerLinkActive="active"><a [routerLink]="['/contatos']" class="btn btn-primary btn-conta orange darken-4">CONTATOS</a></li> -->
		<a class="btn btn-primary btn-conta orange darken-4 btn-arredondado" href="/portal-socio">ACESSAR MINHA CONTA</a>
	</ul>

</div>
