<?php

session_start();

require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Resource.php';
require __DIR__ . '/../src/ResourceRepository.php';
require __DIR__ . '/../includes/functions.php';

use App\Database;
use App\Resource;
use App\ResourceRepository;

$errors = validate_resource($_POST);

if ($errors) {
    set_flash('error', implode(' ', $errors));
    redirect('create.php');
}

$resource = new Resource(
    id: null,
    title: trim($_POST['title']),
    type: trim($_POST['type']),
    status: $_POST['status'],
    borrower: trim($_POST['borrower'] ?? '') ?: null,
);

$repo = new ResourceRepository(Database::getInstance());
$repo->create($resource);

set_flash('success', 'Ressource ajoutée.');
redirect('index.php');
