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

use Nette\Config\Compiler;
use Nette\Config\Configurator;
use Nette\DI\Container;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class Module extends \Venne\Module\Module {


	/** @var string */
	protected $version = "2.0";

	/** @var string */
	protected $description = "Assets module for Venne:CMS";

}
