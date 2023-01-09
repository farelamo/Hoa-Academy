<?php

    namespace App\Services\Admin\Absensi;

    use Alert;
    use Exception;
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

        public function check($timeAbsensi, $course_id)
        {
            $exist = Absensi::where('date', date('Y-m-d'))
                            ->where('course_id', $course_id)
                            ->where('created_by', Auth::user()->id)
                            ->first();
                            
            if($exist){
                toast('Absensi tanggal ' . $exist->date  . ' sudah ada, mohon hapus dahulu', 'error');
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
            $rules = [
                'course_id' => 'required|exists:courses,id',
            ];

            Validator::make($request->all(), $rules, $messages = 
            [
                'course_id.required'    => 'course harus dipilih',
                'course_id.exists'      => 'course belum ada',
            ])->validate();

            try {
                $check = $this->check($request->time, $request->course_id);
                if($check){
                    return $check;
                }
                
                Absensi::create([
                    'date'       => date('Y-m-d'),
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
                $data = Absensi::where('id', $id)->first();

                if ($data->created_by != Auth::user()->id) {
                    return $this->error('Bukan Absensi Anda');
                }

                $check = $this->check($request->time, $request->course_id);
                if($check){
                    return $check;
                }

                $data->update([
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