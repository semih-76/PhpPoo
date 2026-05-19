<?php

session_start();


require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/ResourceRepository.php';
require __DIR__ . '/../includes/functions.php';

use App\Database;
use App\ResourceRepository;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    set_flash('error', 'Méthode non autorisée.');
    redirect('index.php');
}

$id = (int) ($_POST['id'] ?? 0);

$repo = new ResourceRepository(Database::getInstance());
$repo->delete($id);

set_flash('success', 'Ressource supprimée.');
redirect('index.php');
