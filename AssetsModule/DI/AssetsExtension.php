<?php

/**
 * This file is part of the Venne:CMS (https://github.com/Venne)
 *
 * Copyright (c) 2011, 2012 Josef Kříž (http://www.josef-kriz.cz)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace AssetsModule\DI;

use Nette\Config\CompilerExtension;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class AssetsExtension extends CompilerExtension
{

	/**
	 * Processes configuration data. Intended to be overridden by descendant.
	 * @return void
	 */
	public function loadConfiguration()
	{
		parent::loadConfiguration();
		$container = $this->getContainerBuilder();

		$container->addDefinition($this->prefix('assetManager'))
			->setFactory('AssetsModule\Managers\AssetManager');

		$container->getDefinition('nette.latte')
			->addSetup('AssetsModule\Macros\CssMacro::install(?->compiler)', array('@self'))
			->addSetup('AssetsModule\Macros\JsMacro::install(?->compiler)', array('@self'));
	}
}
