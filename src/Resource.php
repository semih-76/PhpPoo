<?php

namespace src;
class Resource
{
    public string $title;
    public string $type;
    public string $status;
    public function __construct(
        string $title,
        string $type,
        string $status ) {
        $this->title = $title;
        $this->type = $type;
        $this->status = $status;
    }
    public function describe(): string {
        return "[{$this->title}] {$this->type}";
    }
    public static function fromArray(array $data): self {
        return new self(
            isset($data['id']) ? (int)$data['id'] : null,
            trim($data['title'] ?? ''),
            trim($data['type'] ?? ''),
            $data['status'] ?? 'disponible',
            trim($data['borrower'] ?? '') ?: null,
        );
    }
}

$livre = new Resource("Clean Code", "livre");
echo $livre->describe();

$r = Resource::fromArray($dbRow);
echo $r->title;