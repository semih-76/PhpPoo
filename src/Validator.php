<?php

namespace App;

class Validator
{
    public static function resource(array $data): array {
        $errors = [];
        $allowedStatuses = ['disponible', 'emprunte', 'maintenance'];
        if (trim($data['title'] ?? '') === '') {
            $errors[] = 'Le titre est obligatoire.';
        }
        if (trim($data['type'] ?? '') === '') {
            $errors[] = 'Le type est obligatoire.';
        }
        if (!in_array($data['status'] ?? '',
            $allowedStatuses, true)) {
            $errors[] = 'Le statut est invalide.';
        }
        return $errors;
    }
}