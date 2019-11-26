<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users\WorkerDetail;
use App\User;
use App\Models\Companies\Job;
use App\Models\Tickets\Ticket;
use App\Models\Companies\Company;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExportController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Display
    |--------------------------------------------------------------------------
    */

    /**
     * Create a new controller instance.
     *
     * @param User $user
     * @param Job $job
     * @param Ticket $ticket
     */
    public function __construct(
        User $user,
        Job $job,
        Ticket $ticket,
        Company $company,
        Request $request
    ) {
        $this->user = $user;
        $this->job = $job;
        $this->ticket = $ticket;
        $this->company = $company;
        $this->r = $request;
    }
    
    public function export()
    {
        // /export?dateFrom=2019-01-01&dateTo=2019-12-31&type=csv&exportBy=job-posts

        $exportBy = $this->r->exportBy;
        $columns = [];
        $rows = [];
        $filename = "BL_{$this->r->exportBy}-{$this->r->dateFrom}-{$this->r->dateTo}.csv";

        switch ($exportBy) {

            case 'workers':

                $generated = $this->generateByWorkers();
                break;

            case 'job-posts' :

            default:

                $generated = $this->generateByJobs();
                $columns = $generated['cols'];
                $rows = $generated['data'];
        }

        $handle = fopen('php://memory', "rw+");

        //add csv headers
        fputcsv($handle, $columns);

        foreach ($rows as $row) {

            fputcsv($handle, $row);
        }

        // reset the file pointer to the start of the file
        fseek($handle, 0);

        // tell the browser it's going to be a csv file
        header('Content-Type: text/csv');

        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="'.$filename.'";');

        // make php send the generated csv lines to the browser
        fpassthru($handle);
    }

    public function showExport()
    {
        return view('admin.jobs');
    }


    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function generateByJobs()
    {
        $dateFrom = Carbon::parse($this->r->dateFrom . '00:00:00');
        $dateTo = Carbon::parse($this->r->dateTo . '23:59:59');

        $cols = [
            'id',
            'company',
            'title',
            'location',
            'exp_level',
            'contract_type',
            'salary',
            'reports_to',
            'created_at',
        ];

        $jobs = Job::query();
        $jobs = $jobs->select([
            'job_posts.id',
            'job_posts.created_at',
            'job_posts.title',
            'job_posts.job_role_id',
            'job_posts.salary',
            'job_posts.location',
            'job_posts.exp_level',
            'job_posts.contract_type',
            'job_posts.reports_to_json',
            'company.name as company',
            'job_role.job_role_name'
        ]);

        $jobs = $jobs->join('companies as company', 'job_posts.company_id', '=', 'company.id');
        $jobs = $jobs->leftJoin('job_roles as job_role', 'job_posts.job_role_id', '=', 'job_role.id');
        $jobs = $jobs->where('job_posts.created_at', '>=', $dateFrom)
                     ->where('job_posts.created_at', '<=', $dateTo)
                     ->orderBy('id', 'desc')
                     ->get();

        $data = array_map(function($job) use($cols) {

            $data = array();

            foreach ($cols as $col) {

                if ($col == 'title' && !$job[$col]) {

                    $job[$col] = $job['job_role_name'];
                }

                if ($col == 'reports_to')
                {

                    if ($job['reports_to_json']) {

                        $reportsTo = json_decode($job['reports_to_json'], true);

                        $job[$col] = implode(",", $reportsTo);

                    } else {

                        $job[$col] = "";
                    }
                }

                $data[$col] = $job[$col];
            }

            return $data;

        }, $jobs->toArray());

        $cols = array_map(function($col) {

            return strtoupper(str_replace("_", " ", $col));
        }, $cols);

        return compact('cols', 'data');
    }

    public function generateByWorkers()
    {
        $dateFrom = Carbon::parse($this->r->dateFrom . '00:00:00');
        $dateTo = Carbon::parse($this->r->dateTo . '23:59:59');

        $cols = [
            'id',
            'full_name',
            'company',
            'role',
            'email',
            'created_at'
        ];

        $workers = WorkerDetail::query();
        $workers = $workers->select([
            'worker_details.id',
            'worker_details.user_id',
            'user.first_name',
            'user.last_name',
            'user.email',
            'user.created_at'
        ]);

        $workers = $workers->join('users as user', 'worker_details.user_id', '=', 'user.id');

        $workers = $workers->where('user.created_at', '>=', $dateFrom)
            ->where('user.created_at', '<=', $dateTo)
            ->orderBy('id', 'desc')
            ->get();

        dd($workers->toArray());

        $data = array_map(function($job) use($cols) {

            $data = array();

            foreach ($cols as $col) {

                if ($col == 'title' && !$job[$col]) {

                    $job[$col] = $job['job_role_name'];
                }

                if ($col == 'reports_to')
                {

                    if ($job['reports_to_json']) {

                        $reportsTo = json_decode($job['reports_to_json'], true);

                        $job[$col] = implode(",", $reportsTo);

                    } else {

                        $job[$col] = "";
                    }
                }

                $data[$col] = $job[$col];
            }

            return $data;

        }, $jobs->toArray());

        $cols = array_map(function($col) {

            return strtoupper(str_replace("_", " ", $col));
        }, $cols);

        return compact('cols', 'data');
    }
}
