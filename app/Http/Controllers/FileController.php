<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\FileSystem;
use GrahamCampbell\Flysystem\Facades\Flysystem;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileController extends Controller {

    /** @var FileSystem */
    protected $fileSystemService;

    public function __construct(FileSystem $filesystem)
    {
        $this->fileSystemService = $filesystem;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Flysystem::listContents('/');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @throws \Exception
     * @return Response
     */
	public function store(Request $request)
	{
        $jsonBody = $request->all();

        if($this->fileSystemService->validator($jsonBody)->fails()){
            throw new \Exception('test');
        } else {
            $created = $this->fileSystemService->create($jsonBody);

            if($created) {
                return (new Response("", 204));
            } else {
                return (new Response("Entity not created", 409));
            }
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
