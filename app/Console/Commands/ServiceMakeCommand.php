<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * The name of class being generated.
     *
     * @var string
     */
    private $serviceClass;

    /**
     * The name of class being generated.
     *
     * @var string
     */
    private $service;

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function fire(){

        $this->setServiceClass();

        $path = $this->getPath($this->serviceClass);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($this->serviceClass));

        $this->info($this->type.' created successfully.');

        $this->line("<info>Created Service :</info> $this->serviceClass");
    }

    /**
     * Set service class name
     *
     * @return  void
     */
    private function setServiceClass()
    {
        $name = ucwords(strtolower($this->argument('name')));

        $this->service = $name;

        $serviceClass = $this->parseName($name);

        $this->serviceClass = $serviceClass . 'Service';

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        if(!$this->argument('name')){
            throw new InvalidArgumentException("Missing required argument service name");
        }

        $name = ucwords($this->argument('name'));

        $this->service = $name;

        $stub = parent::replaceClass($stub, $name);

        if (str_contains($this->service, '\\')) {
            $serviceName = explode('\\', $this->service);
        } elseif (str_contains($this->service, '/')) {
            $serviceName = explode('/', $this->service);
        }

        return str_replace('DummyService', isset($serviceName) ? $serviceName[1] : $this->service, $stub);
    }

    /**
     * 
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return  base_path('stubs/Service.stub');
    }
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service class.'],
        ];
    }
}