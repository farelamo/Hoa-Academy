<?php

    namespace App\Services\Admin\Vocabulary;

    use Alert;
    use Exception;
    use App\Models\Vocabulary;
    use App\Http\Requests\Admin\Vocabulary\VocabularyRequest;

    class VocabularyService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            
            $vocabs = Vocabulary::select('id', 'name')->get();
                
            return view(
                'dashboard.admin.vocabulary.vocabulary',
                ["title" => "vocabulary"],
                compact('vocabs')
            );
        }

        public function store(VocabularyRequest $request)
        {
            try {

                Vocabulary::create([
                    'name' => $request->name
                ]);

                Alert::success('Naice', 'Vocabulary berhasil ditambahkan');
                return redirect('/admin/vocabulary');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, VocabularyRequest $request)
        {
            try {
                $data = Vocabulary::where('id', $id)->first();
                $data->update(['name' => $request->name]);

                Alert::success('Naice', 'Vocabulary berhasil diupdate');
                return redirect('/admin/vocabulary');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = Vocabulary::where('id', $id)->first();
                $data->delete();

                Alert::success('Naice', 'Vocabulary berhasil dihapus');
                return redirect('/admin/vocabulary');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>