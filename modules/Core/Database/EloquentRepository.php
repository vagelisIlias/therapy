<?php

declare(strict_type=1);

namespace Modules\Core\Database;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Core\Database\Repository;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class EloquentRepository implements Repository
{
    public function __construct(protected EloquentModel $model)
    {
    }

    public function findById(int $id): ?EloquentModel
    {
        return $this->model->newQuery()->find($id);
    }

    public function findOrFail(int $id): EloquentModel
    {
        $record = $this->findById($id);

        if (!$record) {
            $exception = new ModelNotFoundException();
            $exception->setModel(get_class($this->model), [$id]);
            throw $exception;
        }

        return $record;
    }

    public function create(array $attributes): EloquentModel
    {
        return $this->model->newQuery()->create($attributes);
    }

    public function update(int $id, array $attributes): EloquentModel
    {
        $record = $this->findOrFail($id);
        $record->update($attributes);

        return $record;
    }

    public function save(EloquentModel $model): void
    {
        $model->save();
    }

    public function delete(int $id): void
    {
        $record = $this->findOrFail($id);
        $record->delete();
    }
}
