<?php

    namespace App\Services\User\Dashboard;


    class DashboardService {

        public function index()
        {
            return view('dashboard/user/main', ["title" => "Dashboard"]);
        }
    }
?>