<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \App\Models\Users\UserSkill::truncate();
        // DB::statement("SET foreign_key_checks=1");

        // $this->call(AdministratorsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(JobRolesSeeder::class);
        // $this->call(CourseTableSeeder::class);
        // $this->call(SchoolTableSeeder::class);
        // $this->call(CompanyOptionsTableSeeder::class);
        // $this->call(CompanyTableSeeder::class);
        // $this->call(SkillsTableSeeder::class);
        // $this->call(LevelsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(AnotherWorkerTableSeeder::class);
        // $this->call(AnotherWorker1TableSeeder::class);
        // $this->call(AnotherWorker2TableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(BookmarksTableSeeder::class);
        $this->call(CacheTableSeeder::class);
        $this->call(CalendarUnavailabilityTableSeeder::class);
        $this->call(ChatChannelMembersTableSeeder::class);
        $this->call(ChatChannelsTableSeeder::class);
        $this->call(ChatHistoryTableSeeder::class);
        $this->call(ChatRequestTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(CompanyBusinessTypesTableSeeder::class);
        $this->call(CompanyMainFunctionAnswersTableSeeder::class);
        $this->call(CompanyMainFunctionsTableSeeder::class);
        $this->call(CompanyPostsTableSeeder::class);
        $this->call(CompanySecondaryFunctionsTableSeeder::class);
        $this->call(CompanySpecializationTableSeeder::class);
        $this->call(CompanyTiersTableSeeder::class);
        $this->call(ConnectionsTableSeeder::class);
        $this->call(ConnectionsMapTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(EducationsTableSeeder::class);
        $this->call(JobDaylabourBookingTableSeeder::class);
        $this->call(JobDaylabourDetailsTableSeeder::class);
        $this->call(JobDaylabourRequirementsTableSeeder::class);
        $this->call(JobDaylabourShiftRecordsTableSeeder::class);
        $this->call(JobDisputeChannelTableSeeder::class);
        $this->call(JobDisputeHistoryTableSeeder::class);
        $this->call(JobPostApplicantsTableSeeder::class);
        $this->call(JobPostStatsTableSeeder::class);
        $this->call(JobPostsTableSeeder::class);
        $this->call(JobRequirementsTableSeeder::class);
        $this->call(JobResponsibilitiesTableSeeder::class);
        $this->call(JobRolesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(MetasTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(TradeListTableSeeder::class);
        $this->call(TradeListParentTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(UserRatingsTableSeeder::class);
        $this->call(UserSkillsTableSeeder::class);
        $this->call(UserTicketsTableSeeder::class);
        $this->call(UsersFirebaseTableSeeder::class);
        $this->call(UsersNotificationInfoTableSeeder::class);
        $this->call(WorkExperienceTableSeeder::class);
        $this->call(WorkExperiencePositionsTableSeeder::class);
        $this->call(WorkExperienceResponsibilitiesTableSeeder::class);
        $this->call(WorkerAreasTableSeeder::class);
        $this->call(WorkerDaylabourDetailsTableSeeder::class);
        $this->call(WorkerDetailsTableSeeder::class);
        $this->call(WorkerTiersTableSeeder::class);
    }
}
