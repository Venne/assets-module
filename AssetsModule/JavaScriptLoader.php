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

use WebLoader\Compiler;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class JavaScriptLoader extends \WebLoader\Nette\JavaScriptLoader
{

	/** @var string */
	private $relativeTempPath;


	public function __construct(Compiler $compiler, $relativeTempPath)
	{
		parent::__construct($compiler, '');

		$this->relativeTempPath = $relativeTempPath;
	}


	public function render()
	{
		$this->setTempPath($this->presenter->template->basePath . $this->relativeTempPath);

		parent::render();
	}
}

