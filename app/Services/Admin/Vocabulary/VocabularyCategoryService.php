<?php

    namespace App\Services\Admin\Vocabulary;

    use Alert;
    use Exception;
    use App\Models\VocabularyCategory;
    use App\Http\Requests\Admin\Vocabulary\CategoriesRequest;

    class VocabularyCategoryService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            $vocabCategories = VocabularyCategory::select('id', 'name')->get();
                
            return view(
                'dashboard.admin.vocabulary.vocabulary_category',
                ["title" => "vocabulary_category"],
                compact('vocabCategories')
            );
        }

        public function store(CategoriesRequest $request)
        {
            try {

                VocabularyCategory::create([
                    'name' => $request->name
                ]);

                Alert::success('Naice', 'Category berhasil ditambahkan');
                return redirect('/admin/vocabulary/category');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, CategoriesRequest $request)
        {
            try {
                $data = VocabularyCategory::where('id', $id)->first();
                $data->update(['name' => $request->name]);

                Alert::success('Naice', 'Category berhasil diupdate');
                return redirect('/admin/vocabulary/category');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = VocabularyCategory::where('id', $id)->first();
                $data->delete();

                Alert::success('Naice', 'Category berhasil dihapus');
                return redirect('/admin/vocabulary/category');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>