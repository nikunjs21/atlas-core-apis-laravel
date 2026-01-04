<?php

namespace App\Application\DTOs;

class WorkspaceDTO
{
    public function __construct(
        public int $id,
        public int $ownerId,
        public string $name,
        public string $description
    ) {}

    
}
