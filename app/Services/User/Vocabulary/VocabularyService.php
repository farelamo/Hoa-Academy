<?php

    namespace App\Services\User\Vocabulary;

    use Illuminate\Support\Facades\Auth;
    use App\Models\Vocabulary;
    use App\Models\VocabularyCategory;
    use App\Models\VocabularyField;
    use Carbon\Carbon;
    use Exception;
    use Alert;

    class VocabularyService {

        public function index()
        {
            $vocabCats = VocabularyCategory::select('id', 'name')->has('vocabulary_fields')->paginate(8);

            return view('dashboard/user/vocabulary',["title" => "Vocabulary"], compact('vocabCats'));
        }

        public function show($id)
        {
            $event = Event::where('id', $id)->first();

            return view('event-detail', ['title' => 'Event'], compact('event'));
        }

        public function join($id)
        {
            try {

                if (Auth::user()->role == 'admin'){
                    Alert::error('Oops', 'Admin ga bole ikut2 ya :)');
                    return redirect()->back();
                }
                
                $data  = Event::where('id', $id)->first();
                $check = $data->users()->where('user_id', Auth::user()->id)->first();
                if (!empty($check)) {
                    Alert::error('Oops', 'Kamu telah terdaftar di event ini');
                    return redirect('/event/'. $id);
                }

                $data->users()->attach(Auth::user()->id);

                Alert::success('Selamat', 'Kamu berhasil mendaftar');
                return redirect('/event/'. $id);
            } catch (Exception $e) {
                Alert::error('Oops', 'Terjadi Kesalahan');
                return redirect()->back();
            }
        }
    }
?>