<?php

namespace Sparkout\AdminDashboard\App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use File;

class GenerateBladeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:view';

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

        $name = $this->ask('What is your crud name?');

        if ($this->confirm('Do you wish to want to add blade?')) {
            $this->blade($name);
        }

        $this->controller($name);
        $this->model($name);
        $controllerName = ucfirst($name);
        $route = Str::plural(strtolower($name));
        File::append(
            base_path('routes/api.php'),
            str_replace(
                'controllerName',
                '',
                'Route::resource("' .$route. '",App\Http\Controllers\controllerName'.$controllerName.'Controller::class);'
            )
        );
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function blade($name)
    {
        $bladeName = strtolower(Str::plural($name));
        $controllerName = ucfirst($name);
        $route = Str::plural(strtolower($name));
        $modelTemplate = str_replace(
            ['{{modelNamePluralLowerCase}}'],
            [$bladeName],
            $this->getStub('Blade')
        );
        file_put_contents(resource_path("views/{$bladeName}.blade.php"), $modelTemplate);
        File::append(
            base_path('routes/web.php'),
            str_replace(
                'controllerName',
                '',
                'Route::get("' .$route. '",[App\Http\Controllers\controllerName'.$controllerName.'Controller::class, "view"]);'
            )
        );
    }

    protected function model($name)
    {
        $name = ucfirst($name);
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
    }


    protected function controller($name)
    {
        $controllerName = ucfirst($name);
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $controllerName,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$controllerName}Controller.php"), $controllerTemplate);
    }
}
