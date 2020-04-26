<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\StreamOutput;

class BuildGeneralPageView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:gpview {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Building a general page view.';

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
     * php artisan make:view couriers.manager --layout=page --section='title' --section='page_title' --section='page_content'   
     * @return mixed
     */
    public function handle()
    {

        
        if (isset(explode("=", $this->argument('path'))[1])) {
            $path = explode("=", $this->argument('path'))[1];
        } else {
            $path = $this->argument('path');
        }
        $stream = fopen("php://output", "w");
        Artisan::call("make:view " . $path . ' --layout=page --section=\"title\" --section=\"page_title\" --section=\"page_content\" -n',[] , new StreamOutput($stream));        return $stream;
    }
}
