@extends('layouts.site')

@section('title_browser', $title_browser)

@section('content')

    <!-- Beneficios --------------------------------------------- -->
    <section class="section-beneficios">
        <div class="container center">
            <h3>BENEFÍCIOS & VANTAGENS</h3>
            <hr>
            <p>Conheça algumas das vantagens de ser um sócio torcedor do maior campeão piauiense</p>
            <div class="row">
                <div class="col s12 m3 item-beneficio">
                    <div class="item-img-icon">
                        <img class="responsive-img" src="{{ url('images/icon/movie-tickets_256_black.png') }}" alt="">
                    </div>
                    <!-- <i class="material-icons">add</i> -->
                    <h4>Ingressos Garantidos</h4>
                    <P>Garantia de obter seus ingressos para participar dos jogos, sem enfrentar filas e usufruindo de toda comodidade de ser sócio.</P>
                </div>

                <div class="col s12 m3 item-beneficio">
                    <div class="item-img-icon">
                        <img class="responsive-img" src="{{ url('images/icon/tag256_black.png') }}" alt="">
                    </div>
                    <h4 clas>Descontos Produtos Oficiais</h4>
                    <P>Descontos em toda a rede de parceiros credenciados, e contagem de pontos para concorrer a prêmios.</P>
                </div>

                <div class="col s12 m3 item-beneficio">
                    <div class="item-img-icon">
                        <img class="responsive-img" src="{{ url('images/icon/vip_256_black.png') }}" alt="">
                    </div>
                    <h4>Exclusividade e Promoções</h4>
                    <P>Exclusividade na compra de ingressos e produtos, gerando pontos para concorrer a prêmios.</P>
                </div>

                <div class="col s12 m3 item-beneficio">
                    <div class="item-img-icon">
                        <img class="responsive-img" src="{{ url('images/icon/icone-ingressos.png') }}" alt="">
                    </div>
                    <h4>Clube de Vantagens</h4>
                    <P>Breve teremos mais informações de como você sócio torcedor irá desfrutrar do seu clube de vantagens.</P>
                </div>
            </div>

        </div>
    </section>

    {{-- Faqs, perguntas e respostas --}}
    {{-- <section class="sections section-faq-home">
        <div class="container center">
            <h1 class="sections-title white-text">PERGUNTAS & RESPOSTAS</h1>
            <hr class="sections-line-write">
            <p class="sections-subtitle white-text">Veja aqui as principais perguntas e respostas e tire suas duvidas sobre o programa</p>
            @forelse ($faqs as $key => $value)
                <div class="row">
                    <h3 class="collapsible z-depth-0">{{$value->pergunta}}</h3>
                    <div class="content">
                        {{$value->resposta}}
                    </div>
                </div>
            @empty
                <h4>Nenhuma pergunta e ou resposta cadastrado!</h4>
            @endforelse

        </div>
    </section> --}}


    <!-- Parceiros e Patrocinadores ----------------------------- -->
    <section class="sections section-patrocinadores grey lighten-5">
        <div class="container center">
            <h1 class="sections-title">PARCEIROS & PATROCINADORES</h1>
            <hr class="sections-line">
            <p class="sections-subtitle">Algumas das empresas que acreditam e confiam na história do Eterno Campeão</p>
            {{-- <h3>Parceiros e Patrocinadores</h3>
            <hr>
            <p>Algumas das empresas que acreditam e confiam na história do Eterno Campeão</p> --}}
            {{-- <img src="" alt=""> --}}
            <img src="{{ url('./images/centro_med.png') }}" alt="" width="180">
            {{-- <div class="row row-patrocinador">
                @forelse ($patrocinadores as $key => $patrocinador)
                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                            <a href="{{ $patrocinador->site }}" target="_blank">

                                <img class="responsive-img" src="http://localhost:8100/storage/{{$patrocinador->logo}}" alt="{{ $patrocinador->nome_razao_social }}" style="max-width: 75%;">

                            </a>
                        </div>
                    </div>
                @empty
                    <h4>Nenhum patrocinador cadastrado!</h4>
                @endforelse
            </div> --}}

            {{-- <div class="row row-patrocinador">
                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                                <img class="responsive-img" src="./../../assets/images/patrocinador/onix.png" alt="">
                        </div>
                    </div>
                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                                <img class="responsive-img" src="./../../assets/images/patrocinador/serv_cozinha.png" alt="">
                        </div>
                    </div>

                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                                <img class="responsive-img" src="./../../assets/images/patrocinador/sesc.png" alt="">
                        </div>
                    </div>

                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                                <img class="responsive-img" src="./../../assets/images/patrocinador/strada_turismo.png" alt="">
                        </div>
                    </div>

                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                                <img class="responsive-img" src="./../../assets/images/patrocinador/teresina_shopping.png" alt="">
                        </div>
                    </div>

                    <div class="col s12 m2 container-img-patrocinador">
                        <div class="img-patrocinador hoverable">
                                <img class="responsive-img" src="./../../assets/images/patrocinador/unifsa.png" alt="">
                        </div>
                    </div>
                </div> --}}
        </div>
    </section>

    <section class="sections section-contatos-map grey lighten-5">
        <div class="section-contatos-map-overlay"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.4318138015487!2d-42.737756884615315!3d-5.194610753839734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x78e32f0be391a49%3A0x52b80d0bf71a8f9!2sRiver+Atl%C3%A9tico+Clube!5e0!3m2!1spt-BR!2sbr!4v1552121015144" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

@endsection



<!-- SCRIPTS JS -->
@section('scripts')
<script type="text/javascript">
    //Collapsible
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>
@endsection
