<?php

namespace App\Repositories\Category;

/**
 * Interface CategoryRepositoryInterface
 *
 * This interface defines the contract for interacting with the categories repository.
 *
 * @package App\Repositories\Category
 */
interface CategoryRepositoryInterface
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Find a category by its ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function find(int $id);

    /**
     * Create a new category.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function create(array $data);

    /**
     * Update the name of an existing category.
     *
     * @param int $id
     * @param string $name
     * @return \App\Models\Category|null
     */
    public function update(int $id, string $name);

    /**
     * Delete a category by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
