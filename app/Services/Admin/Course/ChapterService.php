<?php

    namespace App\Services\Admin\Course;

    use Alert;
    use Exception;
    use App\Models\Course;
    use App\Models\Chapter;
    use Illuminate\Http\Request;
    use App\Http\Requests\Admin\Course\ChapterRequest;

    class ChapterService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            $chapters = Chapter::select('id', 'title', 'course_id', 'ordinal')
                                ->orderBy('course_id', 'asc')
                                ->get();

            return view(
                'dashboard.admin.course.chapter.index',
                ["title" => "chapter"],
                compact('chapters')
            );
        }

        public function create()
        {
            try {
                $courses = Course::select('id', 'title')->get();
                return view('dashboard.admin.course.chapter.create', ["title" => "chapter"], compact('courses'));
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function store(ChapterRequest $request)
        {     
            try {
                $check = Chapter::where('course_id', $request->course_id)->get();
                foreach ($check as $data) {
                    if($data->ordinal == $request->ordinal){
                        toast('Urutan chapter sudah ada','error');
                        return redirect()->back()->withInput();
                    }
                }

                Chapter::create($request->all());

                Alert::success('Naice', 'Chapter berhasil ditambahkan');
                return redirect('/admin/chapter');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function edit($id)
        {
            try {
                $chapter = Chapter::findOrFail($id);
                $courses = Course::select('id', 'title')->get();

                return view( 'dashboard.admin.course.chapter.edit', 
                    ["title" => "chapter"],
                    compact('chapter', 'courses')
                );
            }catch(Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, ChapterRequest $request)
        {

            try {

                $chapter = Chapter::where('id', $id)->first();

                $check = Chapter::where('course_id', $request->course_id)->get();
                foreach ($check as $data) {
                    if($data->id != $chapter->id){
                        if($data->ordinal == $request->ordinal){
                            toast('Urutan chapter sudah ada','error');
                            return redirect()->back()->withInput();
                        }
                    }
                }
                
                $chapter->update($request->all());

                Alert::success('Naice', 'Chapter berhasil diupdate');
                return redirect('/admin/chapter');
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
                $data->delete();

                Alert::success('Naice', 'Course berhasil dihapus');
                return redirect('/admin/course');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>