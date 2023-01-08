<?php

    namespace App\Services\Admin\Course;

    use Alert;
    use Exception;
    use App\Models\Course;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File; 
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Requests\Admin\Course\CourseRequest;

    class CourseService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            $course = Course::select(
                'id', 'title', 'type', 'hsk_type', 
                'level', 'price', 'image'
            )->get();

            return view(
                'dashboard.admin.course.index',
                ["title" => "course"],
                compact('course')
            );
        }

        public function create()
        {
            return view('dashboard.admin.course.create', ["title" => "course"]);
        }

        public function store(CourseRequest $request)
        {     
            try {

                if($request->type == 'business'){
                    $data = ['elementary', 'intermediate', 'advance'];
                    if(!in_array($request->business_type, $data)){
                        toast('Tipe kelas bisnis yang dipilih tidak ada','error');
                        return redirect()->back()->withInput();
                    }
                }

                Course::create($request->all());

                Alert::success('Naice', 'Course berhasil ditambahkan');
                return redirect('/admin/course');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function edit($id)
        {
            try {
                $course = Course::findOrFail($id);
                return view(
                    'dashboard.admin.course.edit', 
                    ["title" => "course"],
                    compact('course')
                );
            }catch(Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, CourseRequest $request)
        {

            try {

                if($request->type == 'business'){
                    $data = ['elementary', 'intermediate', 'advance'];
                    if(!in_array($request->business_type, $data)){
                        toast('Tipe kelas bisnis yang dipilih tidak ada','error');
                        return redirect()->back()->withInput();
                    }
                }

                $data = Course::where('id', $id)->first();
                $data->update($request->all());

                Alert::success('Naice', 'Course berhasil diupdate');
                return redirect('/admin/course');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = Course::where('id', $id)->first();

                if(Storage::disk('local')->exists('public/course/' . $data->image)){
                    Storage::delete('public/course/' . $data->image);
                }

                $data->chapters()->delete();
                $data->delete();

                Alert::success('Naice', 'Course berhasil dihapus');
                return redirect('/admin/course');
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

                $data = Course::where('id', $id)->first();

                if(Storage::disk('local')->exists('public/course/' . $data->image)){
                    Storage::delete('public/course/' . $data->image);
                }
                
                $imageFile = $request->file('image');
                $image     = time() . '-' . $imageFile->getClientOriginalName();
                Storage::putFileAs('public/course/', $imageFile, $image);

                $data->update(['image' => $image]);

                Alert::success('Mantap', 'Gambar berhasil diupdate');
                return redirect()->back();
            }catch (Exception $e) {
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>