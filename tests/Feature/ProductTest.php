<?php
//RapideTest

use App\Models\User;
use App\Models\Product;

test('product page can be accessed by authenticated user', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/products');

    $this->assertAuthenticated();

    $response->assertOk();
});

test('product page correctly lists products in database', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/products');

    //Testing database is empty, we expect to see "No products found."
    $response->assertSee('No products found.');
});

test('product create page can be accessed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/products/create');

    $response->assertOk();
});

test('product can be created', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/products', [
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 3.14,
        ]);

    $response->assertRedirect(route('products.index'));

    //Check database for product
    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 3.14,
    ]);

    //Check if product is listed on index page
    $this
        ->followRedirects($response)
        ->assertSee('Test Product');
});


test('product can be viewed', function () {
    $user = User::factory()->create();


    $product = Product::factory()->create([
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 3.14,
    ]);

    $response = $this
        ->actingAs($user)
        ->get('/products/1');
    
    $response->assertOk();
    $response->assertSee('Test Product');
});

test('product edit page can be accessed', function () {
    $user = User::factory()->create();

    // Create a product (otherwise database is empty)
    $product = Product::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/products/1/edit');

    $response->assertOk();
});

test('product can be updated', function () {
    $user = User::factory()->create();

    $product = Product::factory()->create();

    $response = $this
        ->actingAs($user)
        ->put('/products/1', [
            'name' => 'Updated Product',
            'description' => 'This is an updated product.',
            'price' => 4.99,
        ]);

    $response->assertRedirect(route('products.index'));

    $this->assertDatabaseHas('products', [
        'id' => 1,
        'name' => 'Updated Product',
        'description' => 'This is an updated product.',
        'price' => 4.99,
    ]);
});

test('product can be deleted', function () {
    $user = User::factory()->create();

    $product = Product::factory()->create();

    $response = $this
        ->actingAs($user)
        ->delete('/products/1');

    $response->assertRedirect(route('products.index'));

    $this->assertDatabaseMissing('products', [
        'id' => 1,
    ]);
});

test('CRUD operations not accessible to unauthenticated users', function () {
    $this->assertGuest();

    $response = $this->get('/products');
    $response->assertRedirect(route('login'));

    $response = $this->get('/products/create');
    $response->assertRedirect(route('login'));

    $response = $this->post('/products');
    $response->assertRedirect(route('login'));

    $response = $this->get('/products/1');
    $response->assertRedirect(route('login'));

    $response = $this->get('/products/1/edit');
    $response->assertRedirect(route('login'));

    $response = $this->put('/products/1');
    $response->assertRedirect(route('login'));

    $response = $this->delete('/products/1');
    $response->assertRedirect(route('login'));
});