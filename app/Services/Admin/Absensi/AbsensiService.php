<?php

    namespace App\Services\Admin\Absensi;

    use Alert;
    use JWTAuth;
    use Exception;
    use JWTFactory;
    use App\Models\Absensi;
    use App\Models\Course;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Requests\Admin\Absensi\AbsensiRequest;

    class AbsensiService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function checkDateTime($dateAbsensi, $timeAbsensi)
        {
            $dateNow = date('Y-m-d');
            if($dateAbsensi < $dateNow){
                toast('Tanggal absensi harus lebih dari tanggal sekarang', 'error');
                return redirect()->back()->withInput();
            }

            date_default_timezone_set('Asia/Jakarta');
            $timeNow = date('H:i');
            if($timeAbsensi < $timeNow){
                toast('Waktu absensi harus lebih dari jam sekarang', 'error');
                return redirect()->back()->withInput();
            }
        }

        public function index()
        {
            try {
                $absensis = Absensi::select('id', 'code', 'course_id', 'date', 'time')
                                    ->where('created_by', Auth::user()->id)
                                    ->get();
                
                return view('dashboard.admin.absensi.index', ["title" => "absensi"], compact('absensis'));
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function create()
        {
            try {
                $courses = Course::select('id', 'title')->get();

                return view('dashboard.admin.absensi.create', ["title" => "absensi"], compact('courses'));
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
            
        }

        public function edit($id)
        {
            try {
                $absensi = Absensi::where('id', $id)->first();

                if ($absensi->created_by != Auth::user()->id) {
                    return $this->error('Bukan Absensi Anda');
                }

                $courses = Course::select('id', 'title')->get();

                    
                return view('dashboard.admin.absensi.edit', ["title" => "absensi"], compact('absensi', 'courses'));
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function store(AbsensiRequest $request)
        {
            try {
                $check = $this->checkDateTime($request->date, $request->time);
                if($check){
                    return $check;
                }
                
                Absensi::create([
                    'date'       => $request->date,
                    'time'       => $request->time,
                    'code'       => rand(1000, 9999),
                    'course_id'  => $request->course_id,
                    'created_by' => Auth::user()->id,
                ]);

                Alert::success('Naice', 'Absensi berhasil ditambahkan');
                return redirect('/admin/absensi');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, AbsensiRequest $request)
        {
            try {

                $check = $this->checkDateTime($request->date, $request->time);
                if($check){
                    return $check;
                }

                $data = Absensi::where('id', $id)->first();

                if ($data->created_by != Auth::user()->id) {
                    return $this->error('Bukan Absensi Anda');
                }

                $data->update([
                    'date'       => $request->date,
                    'time'       => $request->time,
                    'code'       => rand(1000, 9999),
                ]);

                Alert::success('Naice', 'Absensi berhasil diupdate');
                return redirect('/admin/absensi');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = Absensi::where('id', $id)->first();

                if ($data->created_by != Auth::user()->id) {
                    return $this->error('Bukan Absensi Anda');
                }

                $data->users()->detach();
                $data->delete();

                Alert::success('Naice', 'Absensi berhasil dihapus');
                return redirect('/admin/absensi');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>