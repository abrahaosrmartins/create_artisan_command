## Reproduce in your project:

This project has a main goal to create a make:service artisan command

- Create ```Service.stub``` file and put in into a ```stubs``` folder outside ```app``` folder
- Execute ``` php artisan make:command ServiceMakeCommand ``` and edit your class file as [this example](https://github.com/abrahaosrmartins/create_artisan_command/blob/main/app/Console/Commands/ServiceMakeCommand.php)
- For Laravel 5 or below, register the command class in your ```app\Consol\Kernel.php```

```
<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\ServiceMakeCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ServiceMakeCommand::class
    ];
}
```

- Run ``` php artisan make:service TestService``` for fun
<hr>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
