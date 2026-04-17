<?php

declare(strict_types=1);

namespace Modules\Core\Database;

use Modules\Core\Database\Model\Model;

interface Repository
{
    public function findById(int $id): ?Model;
    public function findOrFail(int $id): Model;
    public function create(array $attributes): Model;
    public function update(int $id, array $attributes): Model;
    public function save(Model $model): void;
    public function delete(int $id): void;
}
