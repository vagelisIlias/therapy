<?php

declare(strict_type=1);

namespace Modules\Core\Database;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Core\Database\Model\Model;
use Modules\Core\Database\Repository;

class EloquentRepository implements Repository
{
    public function __construct(protected Model $model)
    {}

    public function findById(int $id): ?Model
    {
        return $this->model->newQuery()->find($id);
    }

    public function findOrFail(int $id): Model
    {
        $record = $this->findById($id);

        if (!$record) {
            $exception = new ModelNotFoundException();
            $exception->setModel(get_class($this->model), [$id]);
            throw $exception;
        }

        return $record;
    }

    public function create(array $attributes): Model
    {
        return $this->model->newQuery()->create($attributes);
    }

    public function update(int $id, array $attributes): Model
    {
        $record = $this->findOrFail($id);
        $record->update($attributes);

        return $record;
    }

    public function save(Model $model): void
    {
        $model->save();
    }

    public function delete(int $id): void
    {
        $record = $this->findOrFail($id);
        $record->delete();
    }
}
