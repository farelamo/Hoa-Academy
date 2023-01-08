<?php

    namespace App\Services\User\Course;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Chapter;
    use App\Models\Course;
    use Carbon\Carbon;
    use Exception;
    use Alert;

    class CourseService {

        public function indexHome()
        {
            $courses = Course::paginate(8);
            return view('course', ["title" => "Course"], compact('courses'));
        }

        public function indexDashboard()
        {
            $featured_courses = Course::where('image', '!=', null)
                                        ->whereDoesntHave('users', function ($query){
                                            $query->where('user_id', '=', Auth::user()->id);
                                        })
                                        ->limit(3)
                                        ->get();

            $continue_courses = Course::where('image', '!=', null)
                                        ->whereHas('users', function ($query) {
                                                $query->where('user_id', '=', Auth::user()->id);
                                                $query->where('finished', '=', false);
                                            }
                                        )
                                        ->limit(3)
                                        ->get();

            $finish_courses = Course::where('image', '!=', null)
                                        ->whereHas('users', function ($query){
                                            $query->where('user_id', '=', Auth::user()->id);
                                            $query->where('finished', '=', true);
                                        })
                                        ->limit(4)
                                        ->get();
            
            return view('dashboard.user.course.course', ["title" => "Course"], compact(
                'featured_courses', 'continue_courses', 'finish_courses'
            ));
        }

        public function show($id)
        {
            $course = Course::where('id', $id)->first();

            $check  = $course->whereHas('payment_history', function($query) use ($id){
                                $query->where('course_id', '=', $id);
                                $query->where('user_id', '=', Auth::user()->id);
                                $query->where('success', '=', true);
                            })->get();
                            
            return view('dashboard.user.course.course-detail', ['title' => 'Course'], compact('course', 'check'));
        }

        public function join($id)
        {
            try {

                if (Auth::user()->role == 'admin'){
                    Alert::error('Oops', 'Admin ga bole ikut2 ya :)');
                    return redirect()->back();
                }
                
                $data  = Course::where('id', $id)->first();
                $check = $data->users()->where('user_id', Auth::user()->id)->first();
                if (!empty($check)) {
                    Alert::error('Oops', 'Kamu telah terdaftar di Course ini');
                    return redirect('/Course/'. $id);
                }

                $data->users()->attach(Auth::user()->id);

                Alert::success('Selamat', 'Kamu berhasil mendaftar');
                return redirect('/Course/'. $id);
            } catch (Exception $e) {
                Alert::error('Oops', 'Terjadi Kesalahan');
                return redirect()->back();
            }
        }

        public function showChapter($courseId, $id)
        {
            try {

                $course = Course::where('id', $courseId)->first();
                $check  = $course->whereHas('payment_history', function($query) use ($courseId){
                    $query->where('course_id', '=', $courseId);
                    $query->where('user_id', '=', Auth::user()->id);
                    $query->where('success', '=', true);
                })->get()->toArray();

                if(!$check){
                    Alert::error('Oops', 'Kamu tidak membeli kelas ini');
                    return redirect()->back();
                }

                $chapter = Chapter::where('course_id', $courseId)
                                    ->where('id', $id)
                                    ->first();

                return view('dashboard.user.course.chapter.chapter', ['title' => 'Course'], compact('chapter'));
            }catch (Exception $e) {
                Alert::error('Oops', 'Terjadi Kesalahan');
                return redirect()->back();
            }
        }
    }
?>