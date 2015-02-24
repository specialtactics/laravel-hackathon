<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ManageFilesCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'managefiles';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
	public function fire()
	{
		$this->info('hello world');
		$action = strtolower($this->argument('action'));
		$filename = $this->argument('filename');
		$this->processCommands($action, $filename);
	}

	/**
	 * @param $action
	 * @param $filename
	 */
	public function processCommands($action, $filename)
	{
		switch($action) {
			case 'list':
			{
				$this->info('action: ' . $action . ' filename: ' . $filename);
				break;
			}
			case 'upload':
			{
				$this->info('action: ' . $action . ' filename: ' . $filename);
				break;
			}
			default:
			{
				$this->info('Invalid command');
				break;
			}
		}

	}
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['action', InputArgument::REQUIRED, 'The action to perform'],
			['filename', InputArgument::REQUIRED, 'The file or directory']
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			//['filename', null, InputOption::VALUE_REQUIRED, 'The file or directory name', ''],
		];
	}

}
