<?php

namespace App\Console\Commands;

use App\Services\Cart\CartServiceFacades;
use Illuminate\Console\Command;

class Cart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:insert {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert new cart item.';

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
     * @return int
     */
    public function handle()
    {
        $data = $this->argument('data');

        CartServiceFacades::insert($data);

        CartServiceFacades::insert($data);

        $this->info('Inserted successfully');
        $this->info('Total: ' . CartServiceFacades::count());

        return 0;
    }
}
