<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<br><br>
<center>
<div class="form-group">
<form class="form-horizontal" action="./envio.php" method="POST">
<fieldset style="width: 300px; height: 00px">
	<legend> Testando phpmailer</legend>
    <p>
       <label for="nome"> Seu nome:</label><br>
        <input type="text" class="form-control" size="30" name="nome" placeholder="Digite seu nome">
    </p>
 
    <p>
       <label for="email">Digite o e-mail para receber o teste:</label><br>
        <input type="email" class="form-control" size="30" name="email" placeholder="Digite seu e-mail" title="Este não é um e-mail válido">
    </p>
 
    <p>
        <button type="submit" class="btn btn-primary" name="BTEnvia">Enviar </button>
        <button type="reset" class="btn btn-danger" name="BTApaga">Apagar</button>
    </p>
</div>
