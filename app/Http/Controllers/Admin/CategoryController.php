<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CategoryHelper;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage') ?: 10;
        $keyword = $request->query('keyword');

        $categories = Category::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';

            $categories = $categories->where('description', 'like', $keyword)
                ->orWhere('name', 'like', $keyword);
        }

        $categories = $categories->paginate($perPage);

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        $main_categories = CategoryHelper::getMainCategories();

        return view('admin.pages.categories.create', compact('main_categories'));
    }

    /**
     * @throws Throwable
     */
    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request_data           = $request->validated();
        $request_data['status'] = !!$request->status;

        try {
            Category::create($request_data);

            return redirect()->back()->with('success', 'Category Created Successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Category $category)
    {
        $main_categories = CategoryHelper::getMainCategories();

        $main_categories = CategoryHelper::removeCategoryById($main_categories, $category->id);

        return view('admin.pages.categories.edit', compact('main_categories', 'category'));
    }

    /**
     * @throws Throwable
     */
    public function update(CategoryRequest $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $request_data           = $request->validated();
        $request_data['status'] = !!$request->status;

        DB::beginTransaction();

        try {
            $category->update($request_data);

            DB::commit();

            return redirect()->back()->with('success', 'Category Updated Successfully');
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * @throws Throwable
     */
    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();

        try {
            $category->delete();
            DB::commit();

            return redirect()->route('admin.categories.index')->with('success', 'Category Delete Successfully');
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.categories.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Category $category): \Illuminate\Http\JsonResponse
    {
        $category->update(['status' => !$category->status]);

        return response()->json(['status' => true]);
    }
}
