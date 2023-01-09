<?php

    namespace App\Services\User\Absensi;

    use Alert;
    use Exception;
    use App\Models\Course;
    use App\Models\Absensi;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Requests\User\Absensi\AbsensiRequest;

    class AbsensiService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function check($timeAbsensi, $codeAbsensi, $codeInput)
        {
            date_default_timezone_set('Asia/Jakarta');
            $timeNow = date('H:i');
            if($timeNow > $timeAbsensi){
                return $this->error('Absensi sudah lewat waktu');
            }

            if($codeAbsensi != $codeInput){
                return $this->error('Kode absensi salah');
            }
        }

        public function index()
        {
            try {
                $courses = Course::whereHas('users', function ($query) {
                                            $query->where('user_id', '=', Auth::user()->id);
                                            $query->where('finished', '=', false);
                                        }
                                    )
                                    ->get();

                return view('dashboard.user.absensi.index', ['title' => 'absensi'], compact('courses'));
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
            
        }

        public function store(AbsensiRequest $request)
        {
            try {
                
                $absensi = Absensi::where('course_id', $request->course_id)
                                    ->where('date', date('Y-m-d'))
                                    ->first();
                
                if(!$absensi){
                    return $this->error('Belum ada absensi');
                }

                $check = $this->check($absensi->time, $absensi->code, $request->code);
                if($check){
                    return $check;
                }

                $absensi->users()->attach(Auth::user()->id);

                Alert::success('Naice', 'Absensi Berhasil');
                return redirect()->back();
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>