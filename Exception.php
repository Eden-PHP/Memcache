<?php //-->
/*
 * This file is part of the Memcache package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Memcache;

use Eden\Core\Exception as CoreException;

/**
 * The base class for any class handling exceptions. Exceptions
 * allow an application to custom handle errors that would
 * normally let the system handle. This exception allows you to
 * specify error levels and error types. Also using this exception
 * outputs a trace (can be turned off) that shows where the problem
 * started to where the program stopped.
 *
 * @vendor Eden
 * @package Memcache
 * @author Rolando Sherlon C. Villanueva sherlon_v@yahoo.com
 */
class Exception extends CoreException
{
    const NOT_INSTALLED = 'Memcache is not installed.';
}