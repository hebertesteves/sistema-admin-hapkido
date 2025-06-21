<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$turma = $_POST['turma'];
$data_inicio = $_POST['data_inicio'];
$data_final = $_POST['data_final'];


$antigo = $_POST['antigo'];

$id = $_POST['txtid2'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}


//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $nome){
	$query = $pdo->query("SELECT * FROM periodos where nome = '$nome' and turma = '$turma' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O periodo já está Cadastrado!';
		exit();
	}
}



if($id == ""){
	$res = $pdo->prepare("INSERT INTO periodos SET nome = :nome, turma = :turma, data_inicio = :data_inicio, data_final = :data_final");
	$res->bindValue(":turma", $turma);	


}else{
	$res = $pdo->prepare("UPDATE periodos SET nome = :nome, data_inicio = :data_inicio, data_final = :data_final WHERE id = '$id'");

	
	
}

$res->bindValue(":nome", $nome);

$res->bindValue(":data_inicio", $data_inicio);
$res->bindValue(":data_final", $data_final);


$res->execute();


echo 'Salvo com Sucesso!';

?>