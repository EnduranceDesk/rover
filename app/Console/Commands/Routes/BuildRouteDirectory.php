<?php

namespace App\Console\Commands\Routes;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BuildRouteDirectory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:make {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build route partials';

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
     * @return mixed
     */
    public function handle()
    {
        $partial_text = "<?php" . PHP_EOL . PHP_EOL;
        $partial_text .= "// Route::get('/home', 'HomeController@index')->name('home'); " . PHP_EOL . PHP_EOL;
        if (isset(explode("=", $this->argument('path'))[1])) {
            $path = explode("=", $this->argument('path'))[1];
        } else {
            $path = $this->argument('path');
        }
        $path = base_path("routes" . DIRECTORY_SEPARATOR ."partials") . DIRECTORY_SEPARATOR . str_replace(".", DIRECTORY_SEPARATOR  , $path) . "_route.php";

        

        $dir = str_replace(last(explode("\\", $path)), "", $path);
        if (!is_dir($dir)) {
            mkdir($dir,0777, true);
        }


        if (file_exists($path)) {
            $this->error("File Already Exists.");
            return 1;
        }
        file_put_contents($path, $partial_text);
        Artisan::call("route:restructure");
        $this->info("Created: " . $path);
        return 0;
    }
}
