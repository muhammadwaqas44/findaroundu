<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(DB::raw("INSERT INTO `main_states` (`id`, `name`, `country_id`) VALUES 
(2723, 'Baluchistan', 166),
(2724, 'Federal Capital Area', 166),
(2725, 'Federally administered Tribal ', 166),
(2726, 'North-West Frontier', 166),
(2727, 'Northern Areas', 166),
(2728, 'Punjab', 166),
(2729, 'Sind', 166),
(3919, 'Alabama', 231),
(3920, 'Alaska', 231),
(3921, 'Arizona', 231),
(3922, 'Arkansas', 231),
(3923, 'Byram', 231),
(3924, 'California', 231),
(3925, 'Cokato', 231),
(3926, 'Colorado', 231),
(3927, 'Connecticut', 231),
(3928, 'Delaware', 231),
(3929, 'District of Columbia', 231),
(3930, 'Florida', 231),
(3931, 'Georgia', 231),
(3932, 'Hawaii', 231),
(3933, 'Idaho', 231),
(3934, 'Illinois', 231),
(3935, 'Indiana', 231),
(3936, 'Iowa', 231),
(3937, 'Kansas', 231),
(3938, 'Kentucky', 231),
(3939, 'Louisiana', 231),
(3940, 'Lowa', 231),
(3941, 'Maine', 231),
(3942, 'Maryland', 231),
(3943, 'Massachusetts', 231),
(3944, 'Medfield', 231),
(3945, 'Michigan', 231),
(3946, 'Minnesota', 231),
(3947, 'Mississippi', 231),
(3948, 'Missouri', 231),
(3949, 'Montana', 231),
(3950, 'Nebraska', 231),
(3951, 'Nevada', 231),
(3952, 'New Hampshire', 231),
(3953, 'New Jersey', 231),
(3954, 'New Jersy', 231),
(3955, 'New Mexico', 231),
(3956, 'New York', 231),
(3957, 'North Carolina', 231),
(3958, 'North Dakota', 231),
(3959, 'Ohio', 231),
(3960, 'Oklahoma', 231),
(3961, 'Ontario', 231),
(3962, 'Oregon', 231),
(3963, 'Pennsylvania', 231),
(3964, 'Ramey', 231),
(3965, 'Rhode Island', 231),
(3966, 'South Carolina', 231),
(3967, 'South Dakota', 231),
(3968, 'Sublimity', 231),
(3969, 'Tennessee', 231),
(3970, 'Texas', 231),
(3971, 'Trimble', 231),
(3972, 'Utah', 231),
(3973, 'Vermont', 231),
(3974, 'Virginia', 231),
(3975, 'Washington', 231),
(3976, 'West Virginia', 231),
(3977, 'Wisconsin', 231),
(3978, 'Wyoming', 231)

;"));
    }
}
