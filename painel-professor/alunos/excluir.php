<?php
require_once("../../conexao.php");

// Validar e obter o ID de forma segura
$id = isset($_POST['id']) ? $_POST['id'] : null;
if (!$id) {
    echo 'ID inválido';
    exit;
}

try {
    $pdo->beginTransaction();

    // Excluir professor
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Excluir usuário relacionado
    $stmt2 = $pdo->prepare("DELETE FROM usuarios WHERE cpf = :cpf");
    $stmt2->bindParam(':cpf', $cpf_usu, PDO::PARAM_STR);
    $stmt2->execute();

    $pdo->commit();

    echo 'Excluído com Sucesso!';
} catch (PDOException $e) {
    // Lidar com erros de banco de dados
    $pdo->rollBack();
    echo 'Erro ao excluir: ' . $e->getMessage();
}
?>
