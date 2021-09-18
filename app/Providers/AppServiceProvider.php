<?php

namespace App\Providers;

use App\Services\IceConsumer;
use App\Services\BooksService;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use App\Entity\Books;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IceConsumer::class, function($app){
           
            return new IceConsumer($app->make(Client::class));
        });

        $this->app->bind(BooksService::class, function($app){
            $bookServve =  new BooksService($app->make(EntityManagerInterface::class));
            $bookServve->setBookEntity(new Books());
            return $bookServve;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
