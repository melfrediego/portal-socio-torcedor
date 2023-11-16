$(document).ready(function () {

    //Selecione bandeira cartao
    $(".select_brand_card").on('click', function(){
        var id = $(this).data('id');
        //var source = "{{ asset('images/icon/card_jcb.png') }}";
        var source = "";
        if (id == 'visa') {
            source = $("#image-visa").val();
        }
        if (id == 'master') {
            source = $("#image-master").val();
        }

        if (id == 'elo') {
            source = $("#image-elo").val();
        }

        if (id == 'dinners') {
            source = $("#image-dinners").val();
        }

        if (id == 'discover') {
            source = $("#image-discover").val();
        }

        if (id == 'express') {
            source = $("#image-express").val();
        }

        if (id == 'aura') {
            source = $("#image-aura").val();
        }

        if (id == 'hiper') {
            source = $("#image-hiper").val();
        }

        //$('.img-status').attr('src', source);
        // $(this).parent().removeClass("brand_card_opacidade");
        $(".img-card-icon-input").attr("src", source);
        // $('.img-card-input').html('<img src='{{ asset('images/icon/card_jcb.png') }}' width="45" alt="">');
        $("#bandeira").val(id);
        return false;
    });

    //Aplicando as mascaras nos inputs cpf, valor e vencimento.
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#valor').mask('000.000.000.000.000,00', {reverse: true});
    $('#vencimento').mask('00/0000');
    $('#nascimento').mask('00/00/0000');
    $("#div_installments").addClass("hide")


    //Efetuar pagamento por boleto bancario
    $("#btn_submit_boleto").on('click', function(){
        startModal('load');
        var mensalidade_id = $("#mensalidade_id").val();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $.ajax({
            url: "/transaction-billet",
            data: {mensalidade_id: mensalidade_id},
            type: 'post',
            dataType: 'json',
            success: function (resposta) {
                //$("#myModal").modal('hide');
                stopModal();

                if (resposta.code == 200) {

                    console.log(resposta.data.pdf.charge);

                    var instrucao_boleto = "<p>Sucesso, seu boleto foi gerado!</p>";
                    instrucao_boleto += "<p>Geramos um boleto para voce!, para visualizar clique no botao abaixo!</p>";
                    instrucao_boleto += "<p><a href='"+resposta.data.pdf.charge+"' target='_black' class='btn'>Visualizar Boleto</a></p>";
                    instrucao_boleto += "<p>O mesmo pode ser pago em qualquer agencia ou casa loterica!</p>";

                    startModal('sucesso');
                    $(".text-sucesso").html("");
                    $(".text-sucesso").html(instrucao_boleto);

                    // $("#boleto").removeClass("hide");
                    // html = "";
                    // var html = "<th>" + resposta.data.charge_id + "</th>"
                    // html += "<th>" + resposta.data.installments + "</th>"
                    // html += "<th>" + resposta.data.installment_value + "</th>"
                    // html += "<th>" + resposta.data.status + "</th>"
                    // html += "<th>" + resposta.data.total + "</th>"
                    // html += "<th>" + resposta.data.payment + "</th>";
                    // //{"code":200,"data":{"installments":2,"installment_value":4635,"charge_id":76767,"status":"waiting","total":9270,"payment":"credit_card"}}
                    // $("#result_table").html(html);
                } else {
                    //$("#myModal").modal('hide');
                    alert("Ocorreu um erro - Mensagem: " + resposta.code)
                }
            },
            error: function (resposta) {
                //$("#myModal").modal('hide');
                alert("Ocorreu um erro 2 - Mensagem: " + resposta.responseText)
            }
        });
        return false;
    });

    // $gn.ready(function (checkout) {
    //
    //     $("#btn_submit_cartao").click(function (e) {
    //         e.preventDefault();
    //
    //         startModal('load');
    //
    //         var mensalidade_id = $("#mensalidade_id").val();
    //         var numero_cartao = $("#numero_cartao").val();
    //         var codigo_seguranca = $("#codigo_seguranca").val();
    //         var bandeira = $("#bandeira").val();
    //         var vencimento = $("#vencimento").val();
    //         vencimento = vencimento.split("/");
    //         var mes_vencimento = vencimento[0];
    //         var ano_vencimento = vencimento[1];
    //
    //
    //
    //
    //         var callback = function (error, response) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //
    //             if (error) {
    //                 console.log("aqui2")
    //
    //                  alert("Ocorreu um erro 1 - Mensagem: " + error)
    //             } else {
    //
    //                 $.ajax({
    //                     url: "/transaction-card",
    //                     data: {payament_token: response.data.payment_token, mensalidade_id: mensalidade_id},
    //                     type: 'post',
    //                     dataType: 'json',
    //                     success: function (resposta) {
    //
    //                         stopModal();
    //
    //                         if (resposta.code == 200) {
    //
    //                             startModal('sucesso');
    //                             $(".text-sucesso").html("");
    //                             $(".text-sucesso").html("<p>Seu pagamento foi confirmado com sucesso!</p>");
    //
    //
    //                         } else {
    //
    //                         }
    //                     },
    //                     error: function (resposta) {
    //
    //                         alert("Ocorreu um erro 2 - Mensagem: " + resposta.responseText)
    //                     }
    //                 });
    //             }
    //         }
    //         checkout.getPaymentToken({
    //             brand: bandeira,
    //             number: numero_cartao,
    //             cvv: codigo_seguranca,
    //             expiration_month: mes_vencimento,
    //             expiration_year: ano_vencimento
    //
    //         }, callback);
    //
    //         return false;
    //     });
    //
    // });





});
