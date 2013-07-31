<?php

/**
 * This file is part of the Venne:CMS (https://github.com/Venne)
 *
 * Copyright (c) 2011, 2012 Josef Kříž (http://www.josef-kriz.cz)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace AssetsModule;

use Venne\Module\Helpers;
use WebLoader\Compiler;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class CssLoader extends \WebLoader\Nette\CssLoader
{

	/** @var string */
	private $relativeTempPath;

	/** @var Helpers */
	private $moduleHelpers;

	/** @var string */
	private $resourcesDir;


	public function __construct(Compiler $compiler, $relativeTempPath, $resourcesDir, Helpers $moduleHelpers)
	{
		parent::__construct($compiler, '');

		$this->relativeTempPath = $relativeTempPath;
		$this->resourcesDir = $resourcesDir;
		$this->moduleHelpers = $moduleHelpers;
	}


	public function render()
	{
		$this->setTempPath($this->presenter->template->basePath . $this->relativeTempPath);

		$args = array();
		if (func_num_args() > 0) {
			foreach (func_get_args() as $arg) {
				$args[] = $this->resourcesDir . '/' . $this->moduleHelpers->expandResource($arg);
			}
		}

		call_user_func_array(array($this, 'parent::render'), $args);
	}
}

