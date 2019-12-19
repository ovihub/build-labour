<?php

namespace App\Console\Commands;

use App\Models\Companies\Company;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Companies\Job;
use App\Models\Companies\JobApplicant;
use App\Models\Companies\JobStat;
use App\Models\Users\WorkExperience;
use App\User;
use Illuminate\Console\Command;

class removeTestCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:remove-test-companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove test companies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $companies = Company::all();

        foreach ($companies as $company) {

            if ($this->containsWord('test', strtolower($company->name)))
            {
                echo "company_id - " . $company->id . " -- " . strtolower($company->name);
                echo "\n";

                $jobs = Job::where('company_id', $company->id)->get();

                foreach ($jobs as $job) {

                    echo "job_id - " . $job->id . " -- " . $job->title;
                    echo "\n";

                    JobApplicant::where('job_id', $job->id)->delete();
                    JobStat::where('job_id', $job->id)->delete();

                    $job->delete();
                }

                // delete posts
                CompanyPost::where('company_id', $company->id)->delete();

                // delete company specialization
                CompanySpecialized::where('company_id', $company->id)->delete();

                // delete work experienced attached
                WorkExperience::where('company_id', $company->id)->delete();

                if ($company->CreatedBy) {

                    if ($company->CreatedBy->WorkerDetail) {

                        $company->CreatedBy->WorkerDetail->delete();
                    }

                    JobApplicant::where('user_id', $company->CreatedBy->id);
                    $company->CreatedBy->delete();
                }

                $company->delete();

            }

        }

        // clearning applicants
        $applicants = JobApplicant::all();

        foreach ($applicants as $a) {

            $u = User::find($a->user_id);

            if (!$u)  {

                $a->delete();
            }
        }
    }

    function containsWord($needle, $haystack)
    {
        return strpos($haystack, $needle) !== false;
    }
}
