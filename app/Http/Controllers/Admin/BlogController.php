<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\CreateBlogRequest;
use App\Http\Requests\Admin\Blog\DeleteBlogRequest;
use App\Http\Requests\Admin\Blog\EditBlogRequest;
use App\Http\Requests\Admin\Blog\IndexBlogRequest;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\Blog\ViewBlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexBlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexBlogRequest $request)
    {
        $blogs = Blog::with(['createdBy', 'updatedBy'])->search()->paginate(10);

        return view('admin.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateBlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateBlogRequest $request)
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->blog_description = $request->blogDescription;
        $blog->blog_html_page = $request->blogHtmlPage;
        $blog->created_by = adminUser()->_id ?? $blog->created_by;
        $blog->updated_by = adminUser()->_id ?? $blog->updated_by;
        $blog->save();

        // Set blog image
        if ($request->hasFile('poster')) {
            $blog->addMediaFromRequest('poster')->toMediaCollection('posters');
        }

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Blog (' . $blog->title . ') created successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Blog (' . $blog->title . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewBlogRequest $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(ViewBlogRequest $request, Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditBlogRequest $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(EditBlogRequest $request, Blog $blog)
    {
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBlogRequest $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title ?? $blog->title;
        $blog->blog_description = $request->blogDescription ?? $blog->blog_description;
        $blog->blog_html_page = $request->blogHtmlPage ?? $blog->blog_html_page;
        $blog->updated_by = adminUser()->_id ?? $blog->updated_by;

        if ($request->hasFile('poster')) {
            if ($blog->hasMedia('posters')) {
                $blog->media()->delete();
            }
            $blog->addMediaFromRequest('poster')->toMediaCollection('posters');
        }

        !$request->has('enabled') ?: ($blog->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));

        $blog->update();

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Blog (' . $blog->title . ') updated successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Blog (' . $blog->title . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBlogRequest $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteBlogRequest $request, Blog $blog)
    {
        $blog->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Blog (' . $blog->title . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Blog (' . $blog->title . ') deleted successfully!');
    }
}
