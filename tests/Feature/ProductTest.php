<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Category;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        // Mocking the image file
        $imagePath = storage_path('test_images/test_image.jpg');
        $file = new UploadedFile($imagePath, 'test_image.jpg', 'image/jpeg', null, true);
        $name = 'Test Product #' . random_int(0, 9999);

        // Create categories
        $category1 = Category::create(['name' => 'Category 1']);
        $category2 = Category::create(['name' => 'Category 2']);

        $data = [
            'name' => $name,
            'description' => 'This is a test product.',
            'price' => 4.20,
            'image' => $file,
            'categories' => [$category1, $category2], // ids of categories the product belongs to
        ];

        $response = $this->postJson(route('products.store'), ['data' => $data]);

        //check if product Created successfully
        $response->assertStatus(200);
        $this->assertDatabaseHas('products', ['name' => $name]);
    }
}
