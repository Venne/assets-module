<?php

/**
 * This file is part of the Venne:CMS (https://github.com/Venne)
 *
 * Copyright (c) 2011, 2012 Josef Kříž (http://www.josef-kriz.cz)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace AssetsModule\Macros;

use Nette\Latte\Compiler;
use Venne\Module\Helpers;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class JsMacro extends \Nette\Latte\Macros\MacroSet
{

	/** @var string */
	private $wwwDir;

	/** @var Helpers */
	private $moduleHelpers;


	/**
	 * @param string $wwwDir
	 */
	public function setWwwDir($wwwDir)
	{
		$this->wwwDir = $wwwDir;
	}


	/**
	 * @param Helpers $moduleHelpers
	 */
	public function setModuleHelpers(Helpers $moduleHelpers)
	{
		$this->moduleHelpers = $moduleHelpers;
	}


	public function filter(\Nette\Latte\MacroNode $node, $writer)
	{
		$path = $this->wwwDir . '/' . $this->moduleHelpers->expandResource($node->tokenizer->fetchWord());
		return ("\$control->getPresenter()->getContext()->getService('assets.jsFileCollection')->addFile(" . var_export($path, TRUE) . "); ");
	}


	public static function install(Compiler $compiler, Helpers $moduleHelpers = NULL, $wwwDir = NULL)
	{
		$me = new static($compiler);
		$me->setWwwDir($wwwDir);
		$me->setModuleHelpers($moduleHelpers);
		$me->addMacro('js', array($me, 'filter'));
	}
}

