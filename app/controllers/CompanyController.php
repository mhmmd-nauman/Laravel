<?php

class CompanyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            
		$companies = Company::all();
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
                //$photo = Photo::find(1);
		//$imageable = $photo->imageable;
                //foreach ($staff->photos as $photo)
                //{
                    //
                //}
		return View::make('companies.index')
			->with('companies', $companies);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('companies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			//'vatId'      => 'required'
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('companies/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$company = new Company;
			$company->name       = Input::get('name');
			$company->vatId      = Input::get('vatId');
			//$nerd->nerd_level = Input::get('nerd_level');
			$company->save();

			// redirect
			Session::flash('message', 'Successfully created company!');
			return Redirect::to('companies');
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
		
		$company = Company::find($id);
                return View::make('companies.show')
			->with(compact('company'));
                               
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
		$nerd = Nerd::find($id);

		// show the edit form and pass the nerd
		return View::make('nerds.edit')
			->with('nerd', $nerd);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
                // store
                //$nerd = Nerd::find($id);
                //$nerd->name       = Input::get('name');
                //$nerd->email      = Input::get('email');
                //$nerd->nerd_level = Input::get('nerd_level');
                //$nerd->save();
                //print(Input::get('selected_posts')->toJson());
                //exit;
                //Tag::find($id)->blogposts()->sync(Input::get('selected_posts'));
                //$user->tasks()->sync([5,6,7,8], false);
                // redirect
                Session::flash('message', 'Successfully updated nerd!');
                return Redirect::to('companies');
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$nerd = Nerd::find($id);
		$nerd->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('nerds');
	}

}