<?php

    namespace App\Services\User\Dashboard;

    use Carbon\Carbon;
    use App\Models\Course;
    use App\Models\AbsensiNotes;
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

            $absensi          = AbsensiNotes::where('user_id', Auth::user()->id)
                                            ->get()
                                            ->groupBy(function($val) {
                                                return Carbon::parse($val->created_at)->format('Y');
                                            })
                                            ->toArray();

            $tahunAbsensi     = array_keys($absensi);
            $countAbsensi     = []; 
            foreach ($absensi as $e) {
                array_push($countAbsensi, count($e));
            };
            
            return view('dashboard/user/main', ["title" => "Dashboard"], compact('continue_courses', 'tahunAbsensi', 'countAbsensi'));
        }
    }
?>