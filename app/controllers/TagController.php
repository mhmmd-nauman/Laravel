<?php

class TagController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //echo "its here";
		// get all the nerds
		$tags = Tag::all();
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('tags.index')
			->with('tags', $tags);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('nerds.create');
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
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$nerd = new Nerd;
			$nerd->name       = Input::get('name');
			$nerd->email      = Input::get('email');
			$nerd->nerd_level = Input::get('nerd_level');
			$nerd->save();

			// redirect
			Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('nerds');
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
		
		$tag = Tag::find($id);
               
                $blogposts = $tag->blogposts;
                //echo "<pre>";
                //print_r($blogposts->toArray());
                //echo "</pre>";
		$BlogpostsData=Blogpost::all();
		return View::make('tags.show')
			->with(compact('BlogpostsData'))
                        ->with('blogposts', $blogposts)   
                        ->with('tag', $tag);
                       
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
                Tag::find($id)->blogposts()->sync(Input::get('selected_posts'));
                //$user->tasks()->sync([5,6,7,8], false);
                // redirect
                Session::flash('message', 'Successfully updated nerd!');
                return Redirect::to('tags');
		
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