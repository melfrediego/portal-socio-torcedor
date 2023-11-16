<?php


Auth::routes();
//this::get_browser
Route::get('/', 'SiteController@index')->name('home');
Route::get('/programa', 'SiteController@programa')->name('programa');
Route::get('/planos', 'SiteController@planos')->name('planos');
Route::get('/faqs', 'SiteController@faqs')->name('faqs');
Route::get('/contatos', 'SiteController@contatos')->name('contatos');


Route::get('/novo-socio/plano/{id}', 'SocioController@novo')->name('novo.socio');
Route::get('/get-cidade/{id}', 'SocioController@getCidade')->name('get.cidade');

Route::post('/inserir-novo', 'SocioController@inserirNovo')->name('inserir.novo');
Route::post('/inserir-ticket', 'TicketController@inserirTicket')->name('inserir.ticket');

// Portal Socio
Route::middleware(['auth'])->group(function () {
    Route::get('/portal-socio', 'PortalSocio\PortalSocioController@index')->name('portal.socio');
    Route::get('/portal-socio/perfil', 'PortalSocio\PortalSocioController@perfil')->name('portal.socio.perfil');
    Route::get('/portal-socio/financeiro', 'PortalSocio\PortalSocioController@financeiro')->name('portal.socio.financeiro');
    Route::get('/portal-socio/indique', 'PortalSocio\PortalSocioController@indique')->name('portal.socio.indique');
    // Route::get('/portal-socio/financeiro', 'PortalSocio\PortalSocioController@financiero')->name('portal.socio.termo');

    //GerenciaNet
    //Route::post('/transaction-billet','GerenciaNetBoletoController@transaction_billet')->name('criar-transacao-boleto');
    Route::post('/transaction-billet','GerenciaNetBoletoController@transaction_billet')->name('criar-transacao-boleto');
    Route::post('/transaction-card','GerenciaNetCartaoController@transaction_card')->name('criar.transacao.cartao');
    Route::get('/detalhe-transacao/{charge_id}','GerenciaNetBoletoController@get_transacao')->name('detalhe_transacao');

    Route::get('/alterar-vencimento/{charge_id}','GerenciaNetBoletoController@alterar_vencimento_gerencia_net')->name('alterar_vencimento');

    // Route::get('/email-teste', function (){
    //     Mail::send('email.boas_vindas', ["nome" => "Torcedor Teste"], function($m){
    //        $m->subject('Socio Eterno Campeao - Bem Vindo');
    //        //$m->to('melfre21@gmail.com');//email para envio
    //        $m->to('melfre21@gmail.com');//email para envio
    //     });
    // });
});



Route::get('/home', 'HomeController@index')->name('home');
