<?php

namespace App\Repositories\Product;

use Illuminate\Http\Request;

/**
 * Interface ProductRepositoryInterface
 *
 * This interface defines the contract for interacting with the products repository.
 *
 * @package App\Repositories\Product
 */
interface ProductRepositoryInterface
{
    /**
     * Get all products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(Request $request);

    /**
     * Find a product by its ID.
     *
     * @param int $id
     * @return \App\Models\Product|null
     */
    public function find(int $id);

    /**
     * Create a new product.
     *
     * @param array $data
     * @return \App\Models\Product
     */
    public function create(array $data);

    /**
     * Update an existing product.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Product|null
     */
    public function update(int $id, array $data);

    /**
     * Delete a product by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
