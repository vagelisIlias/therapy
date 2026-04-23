<?php

declare(strict_types=1);

namespace Modules\Core\Database\Contracts;

use Illuminate\Database\Eloquent\Model as EloquentModel;

interface Repository
{
    public function findById(int $id): ?EloquentModel;
    public function findOrFail(int $id): EloquentModel;
    public function create(array $attributes): EloquentModel;
    public function update(int $id, array $attributes): EloquentModel;
    public function save(EloquentModel $model): void;
    public function delete(int $id): void;
}
