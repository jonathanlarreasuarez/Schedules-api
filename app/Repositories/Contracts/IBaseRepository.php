<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
    /**
     * @param $request
     * @return Collection
     */
    public function all($request) : Collection;

    /**
     * save
     *
     * @param  mixed $model
     * @return Model
     */
    public function save(Model $model) : Model;

    /**
     * find
     *
     * @param  mixed $id
     * @return Model
     */
    public function find($id) : Model;

    /**
     * destroy
     *
     * @param  mixed $model
     * @return Model
     */
    public function destroy(Model $model) : Model;

}
