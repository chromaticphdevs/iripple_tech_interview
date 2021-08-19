<?php

    class ReportsController extends Controller
    {
        public function index()
        {
            $this->issue = model('IssueModel');
            /**
             * GET ALL ISSUES sum its cycle
             * 
             */

            $report = $this->issue->report();

            $data = [
                'title' => 'Bug Tracking System Report',
                'report' => $report
            ];

            return $this->view('report/index' , $data);
        }
    }