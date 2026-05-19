<?php

session_start();

require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/ResourceRepository.php';
require __DIR__ . '/../includes/functions.php';

use App\Database;
use App\ResourceRepository;

$id = (int) ($_POST['id'] ?? 0);
$errors = validate_resource($_POST);

if ($errors) {
    set_flash('error', implode(' ', $errors));
    redirect('edit.php?id=' . $id);
}

$repo = new ResourceRepository(Database::getInstance());
$repo->update($id, [
    'title' => trim($_POST['title']),
    'type' => trim($_POST['type']),
    'status' => $_POST['status'],
    'borrower' => trim($_POST['borrower'] ?? '') ?: null,
]);

set_flash('success', 'Ressource modifiée.');
redirect('index.php');
