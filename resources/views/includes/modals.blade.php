<!-- Modal Structure -->
<div id="modalLoad" class="modal">
    <div class="modal-content">
        <h4 class="center"><b>Aguarde!</b></h4>
        <p class="center">Estamos processando sua solicitação.</p>
        <br>
        <p class="center">
            <img src="{{ url('images/gif/loading.gif') }}" alt="" width="50">
        </p>
    </div>
</div>

<!-- Modal Structure Success-->
<div id="modalSucesso" class="modal">
    <div class="modal-content">
        <div class="img_icon center">
            <img src="{{ url('images/icon/success_icon.png') }}" alt="" width="50">
        </div>
        <h4 class="center green-text text-darken-2 text_success"><b>Sucesso!</b></h4>
        <div class="text-sucesso center"></div>
        <div class="btns-modal center">
            <a href="#!" class="modal-close waves-effect waves-green btn">Ok entendi, sair!</a>
        </div>

    </div>
    {{-- <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok!</a>
    </div> --}}
</div>

<!-- Modal Structure Error -->
<div id="modalError" class="modal">
    <div class="modal-content">
        <div class="img_icon center">
            <img src="{{ url('images/icon/error_icon.png') }}" alt="" width="50">
        </div>
        <h4 class="center red-text text-darken-2"><b>Erros!</b></h4>
        <div class="text-error center"></div>
        <div class="btns-modal center">
            <a href="#!" class="modal-close waves-effect waves-green btn">Ok entendi, sair!</a>
        </div>
    </div>
    {{-- <div class="modal-footer center">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Close</a>
    </div> --}}
</div>

{{-- MODAL PAGAMENTO CARTAO --}}
<div id="modalPagamento" class="modal">
    <div class="modal_pagamento_header">
        <h5><i class="material-icons left">credit_card</i> Pagar com cartão de crédito</h5>
        {{-- <p>Escolha abaixo uma forma de pagamento e conclua sua compra!</p> --}}
        <button type="button" name="button" class="btn-sair-modal btn dark white text-black btn-flat" id="btn_close_modal">X</button>
    </div>



    <div class="row">
       <div id="test1" class="col s12 white">
           <div class="modal-content">
             <div class="container-form-modal">
                 <form id="form-cartao">
                     @csrf
                     <input type="hidden" id="mensalidade_id" name="mensalidade_id" value="">

                     <input type="hidden" name="image-source" value="{{ asset('images/icon/card_visa.png') }}" id="image-visa" />
                     <input type="hidden" name="image-source" value="{{ asset('images/icon/card_master.png') }}" id="image-master" />
                     <input type="hidden" name="image-source" value="{{ asset('images/icon/card_elo.png') }}" id="image-elo" />
                     {{-- <input type="hidden" name="image-source" value="{{ asset('images/icon/card_dinners.png') }}" id="image-dinners" /> --}}
                     {{-- <input type="hidden" name="image-source" value="{{ asset('images/icon/card_discover.png') }}" id="image-discover" /> --}}
                     <input type="hidden" name="image-source" value="{{ asset('images/icon/card_express.png') }}" id="image-express" />
                     <input type="hidden" name="image-source" value="{{ asset('images/icon/card_hiper.png') }}" id="image-hiper" />
                     {{-- <input type="hidden" name="image-source" value="{{ asset('images/icon/card_jcb.png') }}" id="image-jcb" /> --}}
                     <input type="hidden" id="bandeira" name="bandeira" value="">
                     <input type="hidden" id="payament_token" name="bandeira" value="">

                     <ul class="row bandeira-card">
                         <span class="col s12">
                             <p class="center-align"><strong>Clique e selecione uma das bandeiras e depois preencha o formulário.</strong></p>
                         </span>
                         <li class="col s2">
                             <a href="#" class="select_brand_card" data-id="visa">
                                 <img src="{{ asset('images/icon/card_visa.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade">
                             </a>
                         </li>
                         <li class="col s2">
                             <a href="#" class="select_brand_card" data-id="mastercard">
                                 <img src="{{ asset('images/icon/card_master.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade">
                             </a>
                         </li>
                         <li class="col s2">
                             <a href="#" class="select_brand_card" data-id="elo">
                                 <img src="{{ asset('images/icon/card_elo.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade">
                             </a>
                         </li>
                         {{-- <li class="col s2">
                             <a href="#" class="select_brand_card" data-id="dinners">
                                 <img src="{{ asset('images/icon/card_dinners.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade">
                             </a>
                         </li> --}}
                         {{-- <li class="col s3"><a href="#" class="select_brand_card" data-id="discover"><img src="{{ asset('images/icon/card_discover.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade"></a></li> --}}
                         <li class="col s2">
                             <a href="#" class="select_brand_card" data-id="amex">
                                 <img src="{{ asset('images/icon/card_express.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade">
                             </a>
                         </li>
                         <li class="col s2">
                             <a href="#" class="select_brand_card" data-id="hipercard">
                                 <img src="{{ asset('images/icon/card_hiper.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade">
                             </a>
                         </li>
                         {{-- <li class="col s3"><a href="#" class="select_brand_card" data-id="jcb"><img src="{{ asset('images/icon/card_jcb.png') }}" alt="" width="70" class="responsive-img brand_card_opacidade"></a></li> --}}
                     </ul>
                     <br>


                     <div class="row">
                         <div class="input-field col s8">
                             <input id="numero_cartao" type="text" name="numero_cartao" placeholder="Infome o numero do cartao">
                             <label for="numero_cartao" class="{{ $errors->has('email') ? '' : 'validate' }}">Número Cartão:</label>
                             <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span>
                             <span class="img-card-input"><img src="{{ asset('images/icon/no_card.png') }}" width="45" alt="" class="img-card-icon-input"></span>

                         </div>

                         <div class="input-field col s4">
                             <input id="codigo_seguranca" type="text" name="codigo_seguranca" placeholder="CVV">
                             <label for="codigo_seguranca" class="{{ $errors->has('email') ? '' : 'validate' }}">Cod. Seguranca:</label>
                             <span class="helper-text" data-error="{{ $errors->has('email') ? 'campo Email obrigatorio' : '' }}" data-success=""></span>
                         </div>
                     </div>

                     <div class="row">
                         <div class="input-field col s8">
                             <input id="nome_titular" type="text" name="nome_titular" placeholder="informe nome impresso no cartao">
                             <label for="nome_titular" class="{{ $errors->has('nome_titular') ? '' : 'validate' }}">Nome Titular Cartão:</label>
                             <span class="helper-text" data-error="{{ $errors->has('nome_titular') ? 'campo Email obrigatorio' : '' }}" data-success=""></span>
                         </div>

                         <div class="input-field col s4">
                             <input id="vencimento" type="text" name="vencimento" placeholder="Vencimento Ex: MM/AAAA">

                             <label for="vencimento" class="{{ $errors->has('vencimento') ? '' : 'validate' }}">Vencimento:</label>
                             <span class="helper-text" data-error="{{ $errors->has('vencimento') ? 'campo Senha obrigatorio' : '' }}" data-success=""></span>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col s12">
                             <div class="col-md-12 text-left">
                                 <button class="btn btn-success btn-large block grey darken-4 btn-cadastrar" id="btn_submit_cartao">
                                     <i class="material-icons right">near_me</i>
                                     Finalizar pagamento
                                 </button>
                             </div>
                         </div>
                     </div>
                 </form>

             </div>
           </div>
       </div>
     </div>
    {{-- <div class="modal-footer center">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Close</a>
    </div> --}}
</div>




{{-- MODAL PAGAMENTO BOLETO --}}
<div id="modalPagamentoBoleto" class="modal">
    <div class="modal_pagamento_header">
        <h5><i class="material-icons left">credit_card</i> Pagar com boleto</h5>
        <button type="button" name="button" class="btn-sair-modal btn dark white text-black btn-flat" id="btn_close_modal">X</button>
    </div>

    <div class="row">
        <div class="col s12 white">
            <form id="form-cartao">
                @csrf
                <input type="hidden" id="mensalidade_id" name="mensalidade_id" value="">
            </form>
            <div class="modal-content center">
                <h4>Importante!</h4>
                <p id="texto_aviso_vencida"></p>
                <p>1 - Pagamentos com boleto podem levar de 1 a 3 dias uteis para serem compensados</p>
                <p>2 - Somente após a compensação do boleto pela instituição financeira você terá acesso completo ao sistema e vantagens</p>
                <br>

                <div class="row">
                    <div class="col s12">
                        <div class="col-md-12 text-left">
                            <button class="btn btn-success btn-large block grey darken-4" id="btn_submit_boleto">
                                {{-- <i class="material-icons right">near_me</i> --}}
                                Finalizar pagamento
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
