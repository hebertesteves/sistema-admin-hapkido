<?php 
$pag = "alunos";
require_once("../conexao.php"); 

@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}


?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-warning btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Aluno</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <!--     Adaptar os campos --->
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 
//  Adaptar os campos --->
                   $query = $pdo->query("SELECT * FROM alunos order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $nome = $res[$i]['nome'];
                      $telefone = $res[$i]['telefone'];
                      $email = $res[$i]['email'];
                      $cpf = $res[$i]['cpf'];
                      $sexo = $res[$i]['sexo'];
                      $datanasc = $res[$i]['datanasc'];
                      $faixas = $res[$i]['faixas'];
                      $anoinicio = $res[$i]['anoinicio'];
                      $endereco = $res[$i]['endereco'];
                  //    $responsavel = $res[$i]['responsavel'];
                      $foto = $res[$i]['foto'];
                      $id = $res[$i]['id'];

                       
                      ?>

<!--     Adaptar os campos --->
                    <tr>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $telefone ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $cpf ?></td>
                        <td><img src="../img/alunos/<?php echo $foto ?>" width="50"></td>
                       

                        <td>
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-info mr-1' title='Ver Endereço'><i class='fas fa-home'></i></a>
                        </td>
                    </tr>
<?php } ?>





                </tbody>
            </table>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];
                //    Adaptar os campos --->
                    $query = $pdo->query("SELECT * FROM alunos where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                      $nome2 = $res[0]['nome'];
                      $telefone2 = $res[0]['telefone'];
                      $email2 = $res[0]['email'];
                      $cpf2 = $res[0]['cpf'];
                      $sexo2 = $res[0]['sexo'];
                      $datanasc2 = $res[0]['datanasc'];
                      $faixas2 = $res[0]['faixas'];
                      $anoinicio2 = $res[0]['anoinicio'];
                      $endereco2 = $res[0]['endereco'];
                 //     $responsavel2 = $res[0]['responsavel'];
                      $foto2 = $res[0]['foto'];

                                                            

                } else {
                    $titulo = "Inserir Registro";

                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                        <div class="form-group">
                        <label >Nome</label>
                        <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label >CPF</label>
                            <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Telefone</label>
                            <input value="<?php echo @$telefone2 ?>" type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                        </div>
        
                          </div>
                    </div>

                    

                    
                    <div class="form-group">
                        <label >Email</label>
                        <input value="<?php echo @$email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Sexo</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="Escolha" disabled selected>Selecione o sexo:</option>
                            <option value="Masculino"<?php if (@$sexo2 === "Masculino") echo " selected"; ?>>Masculino</option>
                            <option value="Feminino"<?php if (@$sexo2 === "Feminino") echo " selected"; ?>>Feminino</option>
                            <option value="Outros"<?php if (@$sexo2 === "Outros") echo " selected"; ?>>Outros</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Data de Nascimento</label>
                        <input value="<?php echo @$datanasc2 ?>" type="date" class="form-control" id="datanasc" name="datanasc" placeholder="Data de Nascimento">
                    </div>


                    <label >Faixas</label>
                    <select class="form-control" id="faixas" name="faixas">
                    <option value="Escolha" disabled selected>Selecione a faixa:</option>
                    <option value="Branca"<?= $faixas2 === "Branca" ? " selected" : "" ?>>Branca</option>
                    <option value="Amarela"<?= $faixas2 === "Amarela" ? " selected" : "" ?>>Amarela</option>
                    <option value="Amarela ponta verde"<?= $faixas2 === "Amarela ponta verde" ? " selected" : "" ?>>Amarela ponta verde</option>
                    <option value="Verde"<?= $faixas2 === "Verde" ? " selected" : "" ?>>Verde</option>
                    <option value="Verde ponta azul"<?= $faixas2 === "Verde ponta azul" ? " selected" : "" ?>>Verde ponta azul</option>
                    <option value="Azul"<?= $faixas2 === "Azul" ? " selected" : "" ?>>Azul</option>
                    <option value="Coral"<?= $faixas2 === "Coral" ? " selected" : "" ?>>Coral</option>
                    <option value="Roxa"<?= $faixas2 === "Roxa" ? " selected" : "" ?>>Roxa</option>
                    <option value="Vermelha"<?= $faixas2 === "Vermelha" ? " selected" : "" ?>>Vermelha</option>
                    <option value="Vermelha ponta preta"<?= $faixas2 === "Vermelha ponta preta" ? " selected" : "" ?>>Vermelha ponta preta</option>
                    <option value="Preta"<?= $faixas2 === "Preta" ? " selected" : "" ?>>Preta</option>
                    </select>


                          <div class="form-group">
                            <label >Ano em que iniciou prática de Hapkido</label>
                            <input value="<?php echo @$anoinicio2 ?>" type="text" class="form-control" id="anoinicio" name="anoinicio" placeholder="Ano que Começou a Praticar Hapkido">
                        </div>

                    <div class="form-group">
                        <label >Endereço</label>
                        <input value="<?php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereco">
                    </div>

                  <!--  <div class="form-group">
                        <label >Cpf do responsavel</label>
                        <input value="<php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereco">
                    </div>  --->

                    </div> 

                    <div class="col-md-5">
                    <div class="form-group">
								<label >Imagem</label>
								<input type="file" value="<?php echo @$foto2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
							</div>

							<div id="divImgConta">
							<?php if(@$foto2 != ""){ ?>
								<img src="../img/alunos/<?php echo $foto2 ?>" width="300" height="300" id="target">
							<?php  }else{ ?>
								<img src="../img/alunos/sem-foto.jpg" width="300" height="300" id="target">
							<?php } ?>
							</div>
                    </div> 
            </div> 


                    
           <!--     Adaptar os campos --->
                    
                  
                   

                    <small>
                        <div id="mensagem">

                        </div>
                    </small> 

                </div>



                <div class="modal-footer">



                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">
                <input value="<?php echo @$email2 ?>" type="hidden" name="antigo2" id="antigo2">

                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir este Registro?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Dados dos Alunos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<?php 
				if (@$_GET['funcao'] == 'endereco') {
					
					$id2 = $_GET['id'];

					$query = $pdo->query("SELECT * FROM alunos where id = '$id2' ");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					$nome3 = $res[0]['nome'];
					$cpf3 = $res[0]['cpf'];
					$telefone3 = $res[0]['telefone'];
					$email3 = $res[0]['email'];
                    $sexo3 = $res[0]['sexo'];
                    $datanasc3 = $res[0]['datanasc'];
                    $faixas3 = $res[0]['faixas'];
                    $anoinicio3 = $res[0]['anoinicio'];
					$endereco3 = $res[0]['endereco'];
             //       $responsavel3 = $res[0]['responsavel'];
                    $foto3 = $res[0]['foto'];

                    $data_F = implode('/', array_reverse(explode('-', $datanasc3)));

                     //CALCULAR IDADE
                     $date1 = $datanasc3;
                     $date2 = date('Y-m-d');
                     $diff = abs(strtotime($date2) - strtotime($date1));
                     $idade = floor($diff / (365*60*60*24));
					
				} 


				?>

				<span><b>Nome: </b> <i><?php echo $nome3 ?></i><br>
				<span><b>Telefone: </b> <i><?php echo $telefone3 ?></i> <span class="ml-4"><b>CPF: </b> <i><?php echo $cpf3 ?></i><br>
				<span><b>Email: </b> <i><?php echo $email3 ?><br>
                <span><b>Sexo: </b> <i><?php echo $sexo3 ?><span class="ml-4"><b>Idade: </b> <i><?php echo $idade ?> Anos</i><br> 
                <span><b>Data de Nascimento: </b> <i><?php echo $data_F ?><br>
                <span><b>Faixas: </b> <i><?php echo $faixas3 ?><br>
                <span><b>Ano que Começou a Praticar Hapkido: </b> <i><?php echo $anoinicio3 ?><br>
				<span><b>Endereço: </b> <i><?php echo $endereco3 ?><br>
            <!--    <span><b>CPF do Responsavel: </b> <i><php echo $responsavel3 ?><br> -->

                <div class="mt-2" align="center">
                <img src="../img/alunos/<?php echo $foto3 ?>" width="250px">
                </div>

			</div>
			
		</div>
	</div>
</div>




<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "endereco") {
    echo "<script>$('#modal-endereco').modal('show');</script>";
}

?>




<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {
                    
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;

                } else {

                    $('#mensagem').addClass('text-danger')
                }

                $('#mensagem').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Excluído com Sucesso!') {


                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_excluir').text(mensagem)



                },

            })
        })
    })
</script>





<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

    function carregarImg() {

        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

</script>





<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>


