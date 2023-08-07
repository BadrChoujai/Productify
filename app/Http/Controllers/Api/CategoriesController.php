<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json([
                'data' => $this->categoryRepository->all()
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
     * Store a newly created Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return $this->categoryRepository->create($request->get('data'));
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
     * Update the specified categories in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            return $this->categoryRepository->update($request->get('id'), $request->get('name'));
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
     * Remove the specified categories from storage.
     * 
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return $this->categoryRepository->delete($id);
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
