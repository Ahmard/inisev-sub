<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::query()->create([
            'user' => 1,
            'website_name' => 'Inisev',
            'website_domain' => 'inisev.com'
        ]);
    }
}
