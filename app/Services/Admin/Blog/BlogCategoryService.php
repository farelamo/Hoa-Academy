<?php

    namespace App\Services\Admin\Blog;

    use Alert;
    use Exception;
    use App\Models\BlogCategory;
    use App\Http\Requests\Admin\Blog\BlogCategory\BlogCategoryAddRequest;
    use App\Http\Requests\Admin\Blog\BlogCategory\BlogCategoryEditRequest;

    class BlogCategoryService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            
            $blogCats = BlogCategory::select('id', 'name')->get();
                
            return view(
                'dashboard.admin.blog.blog_category.index',
                ["title" => "blog_category"],
                compact('blogCats')
            );
        }

        public function store(BlogCategoryAddRequest $request)
        {
            try {

                BlogCategory::create([
                    'name' => $request->name
                ]);

                Alert::success('Naice', 'Kategori blog berhasil ditambahkan');
               return redirect('/admin/blog/category');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, BlogCategoryEditRequest $request)
        {
            try {
                $data = BlogCategory::where('id', $id)->first();
                $data->update(['name' => $request->nameEdit]);

                Alert::success('Naice', 'Kategori blog berhasil diupdate');
               return redirect('/admin/blog/category');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = BlogCategory::where('id', $id)->first();
                $data->blogs()->delete();
                $data->delete();

                Alert::success('Naice', 'Kategori blog berhasil dihapus');
                return redirect('/admin/blog/category');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>