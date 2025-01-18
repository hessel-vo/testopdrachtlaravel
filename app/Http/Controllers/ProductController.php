<?php
//RapideTest

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    // Inject the repository interface
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display all products.
     */
    public function index()
    {
        $products = $this->productRepository->allProducts();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in database.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $data["price"] = (float) $data["price"];

        $this->productRepository->createProduct($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = $this->productRepository->findProduct($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = $this->productRepository->findProduct($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in database.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();
        $this->productRepository->updateProduct($id, $data);

        return redirect()->route('products.index');
    }

    /**
     * Delete specified product from database.
     */
    public function destroy($id)
    {
        $this->productRepository->deleteProduct($id);

        return redirect()->route('products.index');
    }
}