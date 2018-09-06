<?php

namespace App\Controllers\Admin;

use App\Models\Product\Category;
use Core\Controller;
use Core\Request;
use Core\View;

/**
 * Class CategoryController
 * @package App\Controllers\Admin
 */
class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryController constructor.
     * @param Request $request
     * @param Category $category
     */
    public function __construct(Request $request, Category $category)
    {
        $this->category = $category;
        parent::__construct($request);
    }

    public function index()
    {
        $categories = $this->category->getAll();

        View::renderTemplate('admin/categories/index.html', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        View::renderTemplate('admin/categories/create.html');
    }
}
