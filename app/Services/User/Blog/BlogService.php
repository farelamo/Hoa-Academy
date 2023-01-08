<?php

    namespace App\Services\User\Blog;

    use App\Models\Blog;

    class BlogService {

        public function index()
        {
            $blogs = Blog::where('image', '!=', null)->paginate(8);

            return view('blog', ["title" => "Blog"], compact('blogs'));
        }

        public function show($id)
        {
            $blog       = Blog::where('id', $id)->first();
            $comments   = Blog::find($id)->comments()->paginate(5);

            return view('blog-detail', ['title' => 'Blog'], compact('blog', 'comments'));
        }
    }
?>