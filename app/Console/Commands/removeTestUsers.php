<?php

namespace App\Console\Commands;

use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Companies\Job;
use App\Models\Companies\JobApplicant;
use App\Models\Companies\JobStat;
use App\Models\Users\WorkExperience;
use App\User;
use Illuminate\Console\Command;

class removeTestUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:remove-test-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove test users';

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

        $users = User::all();

        foreach ($users as $user) {

            if ($this->containsWord('test', strtolower($user->full_name)) ||
                $this->containsWord('test', strtolower($user->email))
            ) {

                if ($user->email !== 'buildlabouradmin@testmail.com') {

                    echo "user_id - " . $user->id . " -- " . strtolower($user->full_name) . ": " . $user->email;
                    echo "\n";

                    if ($user->Company) {

                        // delete their jobs

                        $jobs = Job::where('company_id', $user->Company->id)->get();

                        foreach ($jobs as $job) {

                            echo "job_id - " . $job->id . " -- " . $job->title;
                            echo "\n";

                            JobApplicant::where('job_id', $job->id)->delete();
                            JobStat::where('job_id', $job->id)->delete();

                            $job->delete();
                        }

                        // delete posts
                        CompanyPost::where('company_id', $user->Company->id)->delete();

                        // delete company specialization
                        CompanySpecialized::where('company_id', $user->Company->id)->delete();

                        // delete work experienced attached
                        WorkExperience::where('company_id', $user->Company->id)->delete();

                        if ($user->Company->CreatedBy) {

                            if ($user->Company->CreatedBy->WorkerDetail) {

                                $user->Company->CreatedBy->WorkerDetail->delete();
                            }
                        }

                        $user->Company->delete();
                    }

                    JobApplicant::where('user_id', $user->id);
                    $user->delete();
                }
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

    public function containsWord($needle, $haystack)
    {
        return strpos($haystack, $needle) !== false;
    }

}