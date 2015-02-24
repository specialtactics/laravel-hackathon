<?php namespace App\Providers;

use App\Services\File;
use Illuminate\Support\ServiceProvider;

class FileSystemServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('FileSystem', function($app)
        {
            return new FileSystem();
        });
	}

}
