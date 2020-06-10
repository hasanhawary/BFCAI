<?php

use App\CourceWeek;
use Illuminate\Database\Seeder;

class WeeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            "week_1",
            "week_2",
            "week_3",
            "week_4",
            "week_5",
            "week_6",
            "week_7",
            "week_8",
            "week_9",
            "week_10",
        ];
        $displayName_ar = [
            'الاسبوع الاول',
            'الاسبوع الثانى',
            'الاسبوع الثالث',
            'الاسبوع الرابع',
            'الاسبوع الخامس',
            'الاسبوع السادس',
            'الاسبوع السابع',
            'الاسبوع التامن',
            'الاسبوع التاسع',
            'الاسبوع العاشر',
            'الاسبوع الحادى عشر',
        ];
        $displayName_en = [
            "Week 1",
            "Week 2",
            "Week 3",
            "Week 4",
            "Week 5",
            "Week 6",
            "Week 7",
            "Week 8",
            "Week 9",
            "Week 10",
        ];
        for ($i = 0; $i < count($name); $i++) {
            CourceWeek::create([
                'name' => $name[$i],
                'displayName_ar' => $displayName_ar[$i],
                'displayName_en' => $displayName_en[$i],
            ]);
        }

    }
}
