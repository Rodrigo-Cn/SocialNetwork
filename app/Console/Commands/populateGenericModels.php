<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\{MaritalStatus, Gender, Category};

class populateGenericModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-generic-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para popular tabelas que possuem registros genéricos para o sistema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $data = json_decode(file_get_contents('database/data/generic_models.json'));

            foreach($data->maritalStatus as $maritalStatus){
                MaritalStatus::firstOrCreate([
                    'status' => $maritalStatus
                ]);
            }


            foreach($data->genders as $gender){
                Gender::firstOrCreate([
                    'name' => $gender
                ]);
            }

            foreach($data->categories as $category){
                Category::firstOrCreate([
                    'name' => $category->name,
                    'description' => $category->description
                ]);
            }

            $this->info('Models populados com sucesso!');
        });
    }
}
