<?php

namespace src;

class ResourceRepository
{
    public function __construct(private PDO $pdo) {}
        public function findAll(): array {
            $stmt =$this->pdo->prepare("SELECT * FROM resources ORDER BY created_at DESC");
            return array_map(fn(array $r) => Resource::fromArray($r), $stmt->fetchAll());
        }
        public function find(int $id): ?Resource
        {
            $stmt = $this->pdo->prepare("SELECT * FROM resources WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch();
            return $row ? Resource::fromArray($row) : null;
        }
        public function create(Resource $r): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO resources (title, type, status, borrower)
             VALUES (:title, :type, :status, :borrower)"
        );
        return $stmt->execute([
            'title' => $r->title, 'type' => $r->type,
            'status' => $r->status, 'borrower'=> $r->borrower,
            ]);
        }
        public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM resources WHERE id = :id");
        return $stmt->execute(['id' => $id]);
        }
}