<?php

namespace App\Repositories\Category;

use App\Models\Category;

/**
 * Class CategoryRepository
 *
 * This class implements the CategoryRepositoryInterface and provides methods to interact with categories.
 *
 * @package App\Repositories\Category
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * Find a category by its ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function find(int $id)
    {
        return Category::find($id);
    }

    /**
     * Create a new category.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function create(array $data)
    {
        return Category::create($data);
    }

    /**
     * Update the name of an existing category.
     *
     * @param int $id
     * @param string $name
     * @return \App\Models\Category|null
     */
    public function update(int $id, string $name)
    {
        $category = Category::find($id);

        if ($category) {
            $category->update([
                'name' => $name
            ]);

            return $category;
        }

        return null;
    }

    /**
     * Delete a category by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();

            return true;
        }

        return false;
    }
}
