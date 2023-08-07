<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(Request $request)
    {
        $products = Product::with('categories');

        if ($request->minPrice !== null) {
            $products->where('price', '>=', $request->minPrice);
        }

        if ($request->maxPrice !== null) {
            $products->where('price', '<=', $request->maxPrice);
        }

        $products = $products->get();

        foreach ($products as $product) {
            $product->image = $product->image ? asset('storage/images') . '/' . $product->image : null;
        }

        return $products;
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
        // Store the product with the image path
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        // Handle image upload
        if ($data['image']) {
            $imageName = $data['image']->getClientOriginalName();
            Storage::disk('public')->put('images/' . $imageName, file_get_contents($data['image']));
            $product->image = $imageName;
        }

        $product->save();
        $product->categories()->attach(explode(',', $data['categories']));

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
