<?php namespace App\Services;

use App\User;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class FileSystem implements RegistrarContract {

    const TYPE_FILE = 'file';
    const TYPE_FOLDER = 'folder';

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
            'fileType' => 'required|in:' . self::TYPE_FILE . ',' . self::TYPE_FOLDER,
			'name' => 'required|max:255',
		]);
	}

	/**
	 * Create a new file instance.
	 *
	 * @param  array  $data
	 * @return File
	 */
	public function create(array $data)
	{
        if($data['fileType'] == self::TYPE_FILE) {
            return Flysystem::put($data['name'], $data['content']);
        }
        return false;
	}

    public function get($filePath)
    {
        $file = Flysystem::read($filePath);
        return $file;
    }

}


