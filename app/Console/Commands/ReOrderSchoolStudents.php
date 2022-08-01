<?php

namespace App\Console\Commands;

use App\Models\School;
use App\Models\Student;
use Illuminate\Console\Command;

class ReOrderSchoolStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schools = School::whereHas('students')->get();
        foreach ($schools as $school)
        {
            $allStudents =  Student::where('school_id', $school->id)->get();

            if($allStudents[0]->order != 1)
            {
                $allStudents[0]->update([
                    'order' => 1
                ]);
            }

            if($allStudents->count() == 1)
            {
                continue;
            }

           for ($i=0; $i < $allStudents->count()-1; $i++)
           {
               if($allStudents[$i+1]->order - $allStudents[$i]->order != 1)
               {
                    $allStudents[$i+1]->update([
                        'order' => $allStudents[$i]->order + 1
                    ]);
               }
           }

        }

    }
}
