<?php

    namespace App\Services\User\Dashboard;

    use App\Models\Course;
    use Illuminate\Support\Facades\Auth;
    
    class DashboardService {

        public function index()
        {
            $continue_courses = Course::where('image', '!=', null)
                                        ->whereHas('users', function ($query) {
                                                $query->where('user_id', '=', Auth::user()->id);
                                                $query->where('finished', '=', false);
                                            }
                                        )
                                        ->limit(3)
                                        ->get();

            return view('dashboard/user/main', ["title" => "Dashboard"], compact('continue_courses'));
        }
    }
?>