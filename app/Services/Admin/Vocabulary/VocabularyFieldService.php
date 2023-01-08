<?php
  namespace App\Services\Admin\Vocabulary;

  use Alert;
  use Storage;
  use Exception;
  use App\Models\Vocabulary;
  use Illuminate\Http\Request;
  use App\Models\VocabularyField;
  use App\Models\VocabularyCategory;
  use App\Http\Requests\Admin\Vocabulary\VocabularyFieldRequest;

  class VocabularyFieldService {

    public function error($kalimat)
    {
        Alert::error('Oops', $kalimat);
        return redirect()->back()->withInput();
    }

    public function deleteSound($filename)
    {
        if(Storage::exists('public/vocabularies/' . $filename)){
            Storage::delete('public/vocabularies/' . $filename);
        }
    }

    public function index()
    {
        
        $vocab_fields = VocabularyField::all();
            
        return view(
            'dashboard.admin.vocabulary.vocabulary_field.index',
            ["title" => "vocabulary_fields"],
            compact('vocab_fields')
        );
    }

    public function create()
    {
        $vocabs      = Vocabulary::select('id', 'name')->get();
        $vocabCats   = VocabularyCategory::select('id', 'name')->get();

        return view(
            'dashboard.admin.vocabulary.vocabulary_field.create', 
            ["title" => "vocabulary_fields"],
            compact('vocabs', 'vocabCats')
        );
    }
    
    public function store(VocabularyFieldRequest $request)
    {
        $validator = $request->validate([
            'sound' => 'required|mimes:mp3|max:5048',
        ],
        [
            'sound.required'   => 'suara harus diisi',
            'sound.mimes'      => 'format suara harus berupa .mp3',
            'sound.max'        => 'maximal suara adalah 5mb',
        ]);

        $soundFile      = $request->file('sound');
        $sound          = time() . '-' . $soundFile->getClientOriginalName();
        Storage::putFileAs('public/vocabularies', $soundFile, $sound);

        try {

            VocabularyField::create([
                'vocabulary_id'           => $request->vocabulary_id,
                'vocabulary_category_id'  => $request->vocabulary_category_id,
                'word'                    => $request->word,
                'mean'                    => $request->mean,
                'vocal'                   => $request->vocal,
                'sound'                   => $sound,
            ]);

            Alert::success('Naice', 'Vocabulary berhasil ditambahkan');
            return redirect('/admin/vocabulary/field');
        }catch (Exception $e){
            $this->deleteSound($sound);
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function edit($id)
    {
        try {
            $vocab_field   = VocabularyField::findOrFail($id);
            $vocabs        = Vocabulary::select('id', 'name')->get();
            $vocabCats      = VocabularyCategory::select('id', 'name')->get();
            
            return view(
                'dashboard.admin.vocabulary.vocabulary_field.edit', 
                ["title" => "vocabulary_fields"],
                compact('vocab_field', 'vocabs', 'vocabCats')
            );
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan'); 
        }

    }

    public function update($id, VocabularyFieldRequest $request)
    {

        $data = VocabularyField::where('id', $id)->first();
        if(!$data){
            return $this->error('Terjadi Kesalahan');
        }

        $update = [
            'vocabulary_id'           => $request->vocabulary_id,
            'vocabulary_category_id'  => $request->vocabulary_category_id,
            'word'                    => $request->word,
            'mean'                    => $request->mean,
            'vocal'                   => $request->vocal,
        ];

        if($request->has('sound')){

            $validator = $request->validate([
                'sound' => 'required|mimes:mp3|max:5048',
            ],
            [
                'sound.required'   => 'suara harus diisi',
                'sound.mimes'      => 'format suara harus berupa .mp3',
                'sound.max'        => 'maximal suara adalah 5mb',
            ]);

            $soundFile = $request->file('sound');
            $sound     = time() . '-' . $soundFile->getClientOriginalName();
            Storage::putFileAs('public/vocabularies', $soundFile, $sound);

            $update['sound'] = $sound;
        }

        $oldSound = $data->sound;

        try {

            $data->update($update);
            if($request->has('sound')){
                $this->deleteSound($oldSound);
            }

            Alert::success('Naice', 'Vocabulary berhasil diupdate');
            return redirect('/admin/vocabulary/field');
        }catch (Exception $e){

            $this->deleteSound($update['sound']);
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function delete($id)
    {
        try {
            $data = VocabularyField::where('id', $id)->first();

            $this->deleteSound($data->sound);
            $data->delete();

            Alert::success('Naice', 'Vocabulary berhasil dihapus');
            return redirect('/admin/vocabulary/field');
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
  }
?>