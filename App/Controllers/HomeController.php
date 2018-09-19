<?php

namespace App\Controllers;

use App\Models\Product\Product;
use Core\Request;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class HomeController extends \Core\Controller
{
    /**
     * @var Product
     */
    private $product;

    /**
     * HomeController constructor.
     * @param Request $request
     * @param Product $product
     */
    public function __construct(Request $request, Product $product)
    {
        $this->product = $product;
        parent::__construct($request);
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $products = $this->product->findBy(['status' => 1]);

        View::renderTemplate('home/index.html', ['products' => $products]);
    }
}
