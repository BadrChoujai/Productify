<?php

namespace App\Repositories\Product;

use App\Models\Product;

/**
 * Class ProductRepository
 *
 * This class implements the ProductRepositoryInterface and provides methods to interact with products.
 *
 * @package App\Repositories\Product
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get all products with their categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Product::with('categories')->get();
    }

    /**
     * Find a product by its ID with its categories.
     *
     * @param int $id
     * @return \App\Models\Product|null
     */
    public function find(int $id)
    {
        return Product::with('categories')->find($id);
    }

    /**
     * Create a new product and associate it with the specified categories.
     *
     * @param array $data
     * @return \App\Models\Product
     */
    public function create(array $data)
    {
        $product = Product::create($data);

        $product->categories()->attach($data['categories']);

        return $product;
    }

    /**
     * Update an existing product and sync its associated categories.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Product|null
     */
    public function update(int $id, array $data)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($data);
            $product->categories()->sync($data['categories']);

            return $product;
        }

        return null;
    }

    /**
     * Delete a product by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
