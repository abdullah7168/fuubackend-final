<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = array(
            [
                'subject' => 'degree_verification_request',
                'is_seen_by_admin' => '1',
                'is_seen_by_student' => '0',
                'status' => '0',
                'student_id' => '1',
                'notes' => 'Your request is processed, You would be entertained with your degree shortly'
            ],
            [
                'subject' => 'degree_verification_request',
                'is_seen_by_admin' => '1',
                'is_seen_by_student' => '0',
                'status' => '0',
                'student_id' => '2',
                'notes' => 'Your request is recieved, Your cgpa does not meet minimum criterea to be illegable to apply for degree.'
            ],
            [
                'subject' => 'degree_verification_request',
                'is_seen_by_admin' => '1',
                'is_seen_by_student' => '0',
                'status' => '0',
                'student_id' => '3',
                'notes' => 'Fee of your last semester is still remaining , therefore you are not illegable to apply for degree.'
            ],
            [
                'subject' => 'degree_verification_request',
                'is_seen_by_admin' => '1',
                'is_seen_by_student' => '0',
                'status' => '0',
                'student_id' => '4',
                'notes' => 'You still have library dues on you as 4500, therefor you are not illegable to apply for degree.'
            ]
        );

        
        foreach ($notifications as $key => $notification) {
            DB::table('notifications')->insert($notification);
        }
    }
}
