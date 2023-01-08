<?php

    namespace App\Services\User\Event;

    use Illuminate\Support\Facades\Auth;
    use App\Models\Event;
    use Carbon\Carbon;
    use Exception;
    use Alert;

    class EventService {

        public function index()
        {
            $event_seminars = Event::where('date', '>',  Carbon::now()->format('Y-m-d'))
                                    ->where('image', '!=', null)
                                    ->where('type', 1)
                                    ->limit(3)
                                    ->get();

            $event_lombas   = Event::where('date', '>',  Carbon::now()->format('Y-m-d'))
                                    ->where('image', '!=', null)
                                    ->where('type', 0)
                                    ->limit(3)
                                    ->get();

            return view('event', ["title" => "Event"], compact('event_seminars', 'event_lombas'));
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