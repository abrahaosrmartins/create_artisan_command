<?php

namespace App\Services;

use App\Repositories\YourRepositoryHere;

class TesteService
{
    /**
     * @var YourRepositoryHere $yourRepositoryHere
     */
    private YourRepositoryHere $yourRepositoryHere;
    
    /**
     * Instantiate repository
     * 
     * @param YourRepositoryHere $yourRepositoryHere
     */
    public function __construct(YourRepositoryHere $yourRepositoryHere)
    {
        $this->yourRepositoryHere = $yourRepositoryHere;
    }

    /**
     * Display a listing of the resource.
     *
     * @param YourRepositoryHere $yourRepositoryHere
     */
    public function getAll(YourRepositoryHere $yourRepositoryHere)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param YourRepositoryHere $yourRepositoryHere
     */
    public function create(YourRepositoryHere $yourRepositoryHere)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param YourRepositoryHere $yourRepositoryHere
     */
    public function getOne(YourRepositoryHere $yourRepositoryHere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param YourRepositoryHere $yourRepositoryHere
     */
    public function update(YourRepositoryHere $yourRepositoryHere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param YourRepositoryHere $yourRepositoryHere
     */
    public function destroy(YourRepositoryHere $yourRepositoryHere)
    {
        //
    }
}