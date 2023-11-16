$(document).ready(function () {

    //Selecione bandeira cartao
    $(".select_brand_card").on('click', function(){
        var id = $(this).data('id');

        //==alert(id);
        //var source = "{{ asset('images/icon/card_jcb.png') }}";
        var source = "";
        if (id == 'visa') {
            source = $("#image-visa").val();
        }
        if (id == 'mastercard') {
            source = $("#image-master").val();
        }

        if (id == 'elo') {
            source = $("#image-elo").val();
        }


        if (id == 'amex') {
            source = $("#image-express").val();
        }

        if (id == 'hipercard') {
            source = $("#image-hiper").val();
        }

        //$('.img-status').attr('src', source);
        // $(this).parent().removeClass("brand_card_opacidade");
        $(".img-card-icon-input").attr("src", source);
        // $('.img-card-input').html('<img src='{{ asset('images/icon/card_jcb.png') }}' width="45" alt="">');

        $("#bandeira").val(id);

        //alert($("#bandeira").val());
        return false;
    });

    //Aplicando as mascaras nos inputs cpf, valor e vencimento.
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#valor').mask('000.000.000.000.000,00', {reverse: true});
    $('#vencimento').mask('00/0000');
    $('#nascimento').mask('00/00/0000');
    $("#div_installments").addClass("hide")

    $gn.ready(function (checkout) {

        // $("#ver_parcelas").click(function () {
        //
        //     if ($('#form')[0].checkValidity()) {
        //         $('#valor').attr('disabled','true');
        //         $('#valor').unmask();
        //         $("#myModal").modal('show');
        //         checkout.getInstallments(parseInt($("#valor").val()), $("#bandeira").val(), function (error, response) {
        //             if (error) {
        //                 // Trata o erro ocorrido
        //                 console.log("checkout");
        //                  $("#myModal").modal('hide');
        //                     alert("Ocorreu um erro - Mensagem: " + error)
        //             } else {
        //
        //                 if (response.code == 200) {
        //                     var options = '';
        //
        //                     for (i = 0; i < response.data.installments.length; i++) {
        //                         options += '<option value="' + response.data.installments[i].installment + '">' + response.data.installments[i].installment + 'x de R$' + response.data.installments[i].currency + '</option>';
        //
        //
        //                     }
        //                     $('#installments').html(options);
        //                     $('#btn_pg_cartao').removeClass('hide');
        //                     $('#ver_parcelas').addClass('hide');
        //                     $("#div_installments").removeClass("hide")
        //                     $("#myModal").modal('hide');
        //                 }
        //             }
        //         });
        //     } else {
        //         alert("Você deverá preencher todos dados do formulário.")
        //     }
        // });


        $("#btn_submit_cartao").on('click', function(e) {
            e.preventDefault();

            startModal('load');

            var mensalidade_id = $("#mensalidade_id").val();
            var numero_cartao = $("#numero_cartao").val();
            var codigo_seguranca = $("#codigo_seguranca").val();
            var bandeira = $("#bandeira").val();
            var vencimento = $("#vencimento").val();
            vencimento = vencimento.split("/");
            var mes_vencimento = vencimento[0];
            var ano_vencimento = vencimento[1];

            //alert(bandeira);

            var callback = function (error, response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if (error) {
                    console.log('ERRO 2', error)
                     alert("Ocorreu um erro 1 - Mensagem: " + error.error_description);
                     
                     stopModal();
                } else {

                    $.ajax({
                        url: "/transaction-card",
                        data: {payament_token: response.data.payment_token, mensalidade_id: mensalidade_id},
                        type: 'post',
                        dataType: 'json',
                        success: function (resposta) {
                            stopModal();

                            if (resposta.code == 200) {

                                var instrucao_cartao = "<p>Seu pagamento foi confirmado.</p>";
                                instrucao_cartao += "<p>O Status da sua mensalidade sera alterado automaticamente</p>";
                                startModal('sucesso');
                                $(".text-sucesso").html("");
                                $(".text-sucesso").html(instrucao_cartao);

                            } else {

                            }
                        },
                        error: function (resposta) {
                            console.log('ERRO 2', resposta)
                            alert("Ocorreu um erro 2 - Mensagem: " + resposta.responseText);
                            stopModal();
                        }
                    });
                }
            }
            checkout.getPaymentToken({
                brand: bandeira,
                number: numero_cartao,
                cvv: codigo_seguranca,
                expiration_month: mes_vencimento,
                expiration_year: ano_vencimento

            }, callback);

            return false;
        });

    });

});
