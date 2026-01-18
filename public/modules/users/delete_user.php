<?php
require __DIR__ . '/../../../includes/auth.php';
require __DIR__ . '/../../../includes/admin_only.php';
require __DIR__ . '/../../../config/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Garante que só pode excluir usuários da mesma empresa
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND company_id = ?");
    $stmt->execute([$id, getCompanyId()]);
}

header("Location: users.php");
exit;
?>