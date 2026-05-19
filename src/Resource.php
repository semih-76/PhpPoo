<?php

namespace App;

class Resource
{
    public function __construct(
        public readonly ?int $id,
        public string $title,
        public string $type,
        public string $status,
        public ?string $borrower = null,
    ) {}

    public function describe(): string
    {
        return "[{$this->title}] {$this->type}";
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: isset($data['id']) ? (int) $data['id'] : null,
            title: trim($data['title'] ?? ''),
            type: trim($data['type'] ?? ''),
            status: $data['status'] ?? 'disponible',
            borrower: trim($data['borrower'] ?? '') ?: null,
        );
    }
}