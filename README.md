# Médiathèque interne

Application web de gestion de ressources (livres, DVD, etc.) permettant d'ajouter, modifier, supprimer et consulter les ressources d'une médiathèque interne.

---

## Prérequis

- PHP 8.1 ou supérieur
- MySQL 5.7 ou supérieur
- Un serveur web local : [XAMPP](https://www.apachefriends.org/) ou [Laragon](https://laragon.org/)

---

## Installation

1. Cloner le projet dans le dossier de ton serveur local (`htdocs` pour XAMPP, `www` pour Laragon) :

```bash
git clone https://github.com/semih-76/PhpPoo.git
```

2. Créer la base de données et la table en exécutant le script SQL suivant dans phpMyAdmin ou ton client MySQL :

```sql
CREATE DATABASE mediatheque CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE mediatheque;

CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(100) NOT NULL,
    status ENUM('disponible', 'emprunte', 'maintenance') NOT NULL DEFAULT 'disponible',
    borrower VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Configuration

Ouvrir le fichier `config/database.php` et renseigner tes informations de connexion :

```php
return [
    'host'     => '127.0.0.1',
    'database' => 'mediatheque',
    'username' => 'root',
    'password' => '',
];
```

---

## Lancement

Démarrer Apache et MySQL depuis XAMPP ou Laragon, puis accéder à l'application dans ton navigateur :

```
http://localhost/mediatheque/public/index.php
```

---

## Structure du projet

```
mediatheque/
├── config/
│   └── database.php         # Paramètres de connexion à la base de données
├── includes/
│   └── functions.php        # Fonctions utilitaires globales
├── public/                  # Point d'entrée de l'application
│   ├── index.php            # Liste des ressources
│   ├── create.php           # Formulaire d'ajout
│   ├── store.php            # Traitement de l'ajout
│   ├── edit.php             # Formulaire de modification
│   ├── update.php           # Traitement de la modification
│   └── delete.php           # Traitement de la suppression
├── src/                     # Classes PHP
│   ├── Database.php
│   ├── Resource.php
│   ├── ResourceRepository.php
│   └── Validator.php
├── views/
│   └── partials/
│       ├── header.php       # En-tête commun à toutes les pages
│       └── footer.php       # Pied de page commun à toutes les pages
└── assets/
    └── style.css
```
L

---

