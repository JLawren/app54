<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index() {

    	$blogs = Blog::all();
		return view('blogs.index', compact('blogs'));
	}

    public function create() {
		return view('blogs.create');
	}

	public function create_post(Request $request) {
		$blog = new Blog();
		$blog->title = $request->title;
		$blog->body = $request->body;
		$blog->save();
		return redirect()->route('blog.index');
	}

	public function delete(Request $request) {

		$blog = Blog::findOrFail($request->id);
		$blog->delete();
		return redirect()->route('blog.index');
	}

	public function edit($id) {

		$blog = Blog::findOrFail($id);
		return view('blogs.edit', compact('blog'));
	}

	public function edit_post(Request $request) {
		$blog = Blog::findOrFail($request->id);
		$blog->title = $request->title;
		$blog->body = $request->body;
		$blog->save();
		return redirect()->route('blog.index');
	}
}
