<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'QMS',
            'display_name' => 'QMS Commudesk',
            'google_credential' => 'uploads/google_credentials/qms-system-c8899-91450570ae3b.json',
            'google_credential_file_name' => 'qms-system-c8899-91450570ae3b.json',
            'google_project_id' => 'qms-system-c8899',
            'google_bq_dataset_name' => 'analytics_180826142'
        ]);

        Client::create([
            'name' => 'Simedarby',
            'display_name' => 'Simedarby',
            'google_credential' => 'uploads/google_credentials/sime-darby-4a39062f4c50.json',
            'google_credential_file_name' => 'sime-darby-4a39062f4c50.json',
            'google_project_id' => 'sime-darby',
            'google_bq_dataset_name' => 'analytics_180573853'
        ]);
    }
}
