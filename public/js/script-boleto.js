$(document).ready(function () {

    //Efetuar pagamento por boleto bancario
    $("#btn_submit_boleto").on('click', function(){
        // alert('script boleto');
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
                    // console.log(resposta.data.pdf.charge);
                    var instrucao_boleto = "<p>Seu boleto foi gerado!</p>";
                    instrucao_boleto += "<p>O mesmo pode ser pago em qualquer agência bancária ou casa lotérica!</p>";
                    instrucao_boleto += "<p>Geramos um boleto para você!, para visualizar clique na imagem PDF abaixo!</p><br />";
                    instrucao_boleto += "<p><a href='"+resposta.data.pdf.charge+"' target='_black'><img src='./images/icon/icon-pdf.png' width='90'></a></p><br />";

                    startModal('sucesso');
                    $(".text-sucesso").html("");
                    $(".text-sucesso").html(instrucao_boleto);

                } else {
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
});
