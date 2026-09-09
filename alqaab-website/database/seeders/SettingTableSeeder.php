<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                'cms_title' => 'AI Soft Nepal CMS',
                'site_name' => 'AI Soft Nepal CMS',
                'first_title' => 'AI Soft Nepal',
                'second_title' => 'AI Soft Nepal',
                'site_email' => 'kesharkalikote6@gmail.com',
                'site_phone' => '9849448466',
                'site_mobile' => '9849448466',
                'site_first_address' => 'Kathmandu',
                'site_second_address' => 'Jadibuti',
                'site_description' => 'AI Soft Nepal Content Management System ',
                'site_url' => 'http://127.0.0.1:8000/',
                'logo' => NULL
            ]
        );
    }
}
