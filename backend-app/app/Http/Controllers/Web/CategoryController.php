<?php

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CategoryController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

    /**
     * Category
     *
     * @var Category
     */
    private $categoryModel;

    /**
     * Tag
     *
     * @var Tag
     */
    private $tagModel;

    /**
     * CategoryController constructor
     *
     * @param Category $categoryModel
     * @param Tag      $tagModel
     */
    public function __construct(Category $categoryModel, Tag $tagModel)
    {
        $this->categoryModel = $categoryModel;
        $this->tagModel = $tagModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View;
     */
    public function index(): View
    {
        $categories = $this->categoryModel->all();

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Category $category
     * @return \Illuminate\Contracts\View\View;
     */
    public function getPosts(Category $category): View
    {
        $posts = $category->posts()->where('publication_status', 'public')->paginate(self::PAGINATION_LIMIT);

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('post.category', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
