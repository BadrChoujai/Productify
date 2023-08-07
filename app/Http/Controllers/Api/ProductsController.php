<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductsController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the products.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return response()->json([
                'data' => $this->productRepository->all($request)
            ]);
        } catch (\Exception $e) {
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode(); // Get the HTTP status code
            } else {
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR; // Default to 500 if not an HTTP exception
            }

            return response()->json([
                'message' => $e->getMessage()
            ], $statusCode);
        }
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'categories' => $request->get('selectedCats'),
            ];

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image');
            }

            return $this->productRepository->create($data);
        } catch (\Exception $e) {
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode(); // Get the HTTP status code
            } else {
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR; // Default to 500 if not an HTTP exception
            }

            return response()->json([
                'message' => $e->getMessage()
            ], $statusCode);
        }
    }

    /**
     * Update the specified products in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            return $this->productRepository->update($request->get('id'), $request->get('data'));
        } catch (\Exception $e) {
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode(); // Get the HTTP status code
            } else {
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR; // Default to 500 if not an HTTP exception
            }

            return response()->json([
                'message' => $e->getMessage()
            ], $statusCode);
        }
    }

    /**
     * Remove the specified products from storage.
     * 
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return $this->productRepository->delete($id);
        } catch (\Exception $e) {
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode(); // Get the HTTP status code
            } else {
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR; // Default to 500 if not an HTTP exception
            }

            return response()->json([
                'message' => $e->getMessage()
            ], $statusCode);
        }
    }
}
