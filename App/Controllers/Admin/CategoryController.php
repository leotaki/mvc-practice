<?php

namespace App\Controllers\Admin;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Services\Store\Services\CategoryStore;
use App\Services\Validators\Validators\CategoryStoreValidator;
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
     * @var CategoryStoreValidator
     */
    private $categoryValidator;

    /**
     * @var CategoryStore
     */
    private $categoryStore;

    /**
     * CategoryController constructor.
     * @param Request $request
     * @param Category $category
     * @param CategoryStoreValidator $validator
     * @param CategoryStore $categoryStore
     */
    public function __construct(
        Request $request,
        Category $category,
        CategoryStoreValidator $validator,
        CategoryStore $categoryStore
    ) {
        $this->category = $category;
        $this->categoryValidator = $validator;
        $this->categoryStore = $categoryStore;
        parent::__construct($request);
    }

    /**
     *
     */
    public function index()
    {
        $categories = $this->category->getAll();

        View::renderTemplate('admin/categories/index.html', [
            'categories' => $categories
        ]);
    }

    /**
     *
     */
    public function create()
    {
        View::renderTemplate('admin/categories/create.html');
    }

    /**
     * @return void
     */
    public function store()
    {
        $data = $this->request->getInput();
        if ($this->categoryValidator->validate($data)) {
            $this->categoryStore->store($data);
        }

        return $this->redirect('\admin\categories');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->category->delete($id);

        return $this->redirect('\admin\categories');
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        $category = $this->category->findById($id);

        View::renderTemplate('admin/categories/update.html', [
            'category' => $category
        ]);
    }
}
