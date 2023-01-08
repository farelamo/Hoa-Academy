<?php

    namespace App\Services\Admin\Blog;

    use Alert;
    use Exception;
    use App\Models\Blog;
    use App\Models\BlogCategory;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Requests\Admin\Blog\BlogRequest;

    class BlogService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            try {
                $blogs = Blog::select('id', 'title', 'image', 'blog_category_id')
                                ->where('user_id', Auth::user()->id)
                                ->get();
                
                return view(
                    'dashboard.admin.blog.index',
                    ["title" => "blog"],
                    compact('blogs')
                );
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function create()
        {
            try {
                $blogCats = BlogCategory::select('id', 'name')->get();
                
                return view(
                    'dashboard.admin.blog.create',
                    ["title" => "blog"],
                    compact('blogCats')
                );
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
            
        }

        public function edit($id)
        {
            try {
                $blogCats = BlogCategory::select('id', 'name')->get();
                $blog     = Blog::where('id', $id)->first();

                if ($blog->user_id != Auth::user()->id) {
                    return $this->error('Bukan Blog Anda');
                }
                    
                return view(
                    'dashboard.admin.blog.edit',
                    ["title" => "blog"],
                    compact('blogCats', 'blog')
                );
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function store(BlogRequest $request)
        {
            try {

                Blog::create([
                    'title'             => $request->title,
                    'desc'              => $request->desc,
                    'short_desc'        => $request->shortDesc,
                    'likes'             => 0,
                    'blog_category_id'  => $request->blogCat,
                    'user_id'           => Auth::user()->id,
                ]);

                Alert::success('Naice', 'Blog berhasil ditambahkan');
                return redirect('/admin/blog');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, BlogRequest $request)
        {
            try {

                $data = Blog::where('id', $id)->first();

                if ($data->user_id != Auth::user()->id) {
                    return $this->error('Bukan Blog Anda');
                }

                $data->update([
                    'title'             => $request->title,
                    'desc'              => $request->desc,
                    'short_desc'        => $request->shortDesc,
                    'blog_category_id'  => $request->blogCat,
                ]);

                Alert::success('Naice', 'Blog berhasil diupdate');
                return redirect('/admin/blog');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = Blog::where('id', $id)->first();

                if ($data->user_id != Auth::user()->id) {
                    return $this->error('Bukan Blog Anda');
                }

                $data->comments()->delete();
                $data->delete();

                Alert::success('Naice', 'Blog berhasil dihapus');
                return redirect('/admin/blog');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function updateImage($id, Request $request)
        {
            $rules = [
                'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            ];

            Validator::make($request->all(), $rules, $messages = 
            [
                'image.required'    => 'gambar harus diisi',
                'image.mimes'       => 'format gambar harus berupa JPG, PNG atau JPEG',
                'image.max'         => 'maximal gambar adalah 5 mb',
            ])->validate();

            try {

                $data = Blog::where('id', $id)->first();

                if(Storage::disk('local')->exists('public/blog/' . $data->image)){
                    Storage::delete('public/blog/' . $data->image);
                }
                
                $imageFile = $request->file('image');
                $image     = time() . '-' . $imageFile->getClientOriginalName();
                Storage::putFileAs('public/blog/', $imageFile, $image);

                $data->update(['image' => $image]);

                Alert::success('Mantap', 'Gambar berhasil diupdate');
                return redirect()->back();
            }catch (Exception $e) {
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>