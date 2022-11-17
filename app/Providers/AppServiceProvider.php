<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Services\ProductComment\ProductCommentService;
use App\Services\ProductComment\ProductCommentServiceInterface;

use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );

        //ProductComment
        $this->app->singleton(
            ProductCommentRepositoryInterface::class,
            ProductCommentRepository::class
        );

        $this->app->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );

//        //Category
//        $this->app->singleton(
//            ProductCategoryRepositoryInterface::class,
//            ProductCategoryRepository::class
//        );
//
//        $this->app->singleton(
//            ProductServicesInterface::class,
//            ProductCategoryServices::class
//        );
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
