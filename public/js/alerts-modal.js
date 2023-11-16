
$(document).ready(function () {
    $('.btn-sair-modal').on('click', function(){
        stopModal();

        return false;
    });
});

function startModal(type){
    $('.modal').modal({
        dismissible: false, // Modal can be dismissed by clicking outside of the modal
        // onOpenEnd: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        //   alert("Ready");
        //   console.log(modal, trigger);
        // },
        onCloseEnd: function() { // Callback for Modal close
            //alert('Closed');
        }
    });

    if (type == 'load') {
        $('#modalLoad').modal('open'); //atribui uma ação open/close...
    }

    if (type == 'sucesso') {
        $('#modalSucesso').modal('open');
    }

    if (type == 'pagamento') {
        $('#modalPagamento').modal('open');
    }


    //Pagamento boleto
    if (type == 'pagamento_boleto') {
        $('#modalPagamentoBoleto').modal('open');
    }

    if (type == 'error') {
        $('#modalError').modal('open');
    }
}

function stopModal(){
    // alert('fechar modal');
    $('.modal').modal('close'); //atribui uma ação open/close...
}
