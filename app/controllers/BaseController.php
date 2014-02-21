<?php

class BaseController extends \Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	/**
	 * layout to use
	 * @var View
	 */
	protected $layout = 'master';

	/**
	 * Used by Controller to setup layout
	 * @return null
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout) )
		{
			$this->layout = View::make($this->layout);
		}
	}

}
