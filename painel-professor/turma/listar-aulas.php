<?php 
require_once("../../conexao.php"); 

$turma = @$_POST['turma'];
$periodo = @$_POST['periodo'];

$query = $pdo->query("SELECT * FROM aulas where turma = '$turma' and periodo = '$periodo' order by id asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {
	}

	$nome = $res[$i]['nome'];
	$descricao = $res[$i]['descricao'];
	$id_aula = $res[$i]['id'];

	echo 'Aula '. ($i+1) . ' - '. $nome .' <a onclick="deletarAula('.$id_aula.')" href="#" title="deletar aula"><i class="far fa-trash-alt ml-2 text-danger"></i></a>';


		echo '<br>';

}
	?>

