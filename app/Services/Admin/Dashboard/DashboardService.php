<?php

    namespace App\Services\Admin\Dashboard;

    class DashboardService {

        public function index()
        {
            return view('dashboard.admin.main', ["title" => "dashboard"]);
        }
    }
?>