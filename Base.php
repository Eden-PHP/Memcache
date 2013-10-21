<?php //-->
/*
 * This file is part of the Memcache package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Memcache;

use Eden\Core\Base as CoreBase;

/**
 * Definition of available memcache methods. Memcache module 
 * provides handy procedural and object oriented interface to 
 * memcached, highly effective caching daemon, which was 
 * especially designed to decrease database load in dynamic 
 * web applications. We cache when computing the same data is 
 * expensive on memory or time. Once the actual data is stored 
 * in memory, it can be used in the future by accessing the 
 * cached copy rather than  recomputing the original data.
 *
 * @vendor Eden
 * @package Memcache
 * @author Rolando Sherlon C. Villanueva sherlon_v@yahoo.com
 */
class Base extends CoreBase
{
	protected $memcache = null;
	
	/**
	* Constructs the base class
	*
	* @param string | null
	* @param int | null
	* @param int | null
	* @return Eden\Memcache\Base
	*/
	public function __construct($host = 'localhost', $port = 11211, $timeout = 1)
	{
		//argument test
		$error = Argument::i()
			//Argument 1 must be a string
			->test(1, 'string')
			//Argument 2 must be an integer
			->test(2, 'int')
			//Argument 3 must be an integer
			->test(3, 'int');
			
		//if memcache is not a class
		if(!class_exists('Memcached')) {
			//throw exception
			Exception::i()->setMessage(Exception::NOT_INSTALLED)->trigger();
		}
		
		try {
			$this->memcache = new \Memcached;
		} catch(Exception $e) {
			//throw exception
			Exception::i()->setMessage(Exception::NOT_INSTALLED)->trigger();
		}
		
		$this->memcache->connect($host, $port, $timeout);
		
		return $this;
	}
	
	/**
	* Terminates the base class
	*
	* @return void
	*/
	public function __destruct()
	{
		if(!is_null($this->memcache)) {
			$this->memcache->close();
			$this->memcache = null;
		}
	}
	
	/**
	 * Add a memcached server to connection pool
	 *
	 * @param string | null
	 * @param int | null
	 * @param bool | null
	 * @param int | null
	 * @param int | null
	 * @return bool | null
	 */
	public function addServer($host = 'localhost', $port = 11211, $persistent = true, $weight = null, $timeout = 1)
	{
		//argument test
		Argument::i()
			//Argument 1 must be a string
			->test(1, 'string')
			//Argument 2 must be an integer
			->test(2, 'int')
			//Argument 3 must be a boolean
			->test(3, 'bool')
			//Argument 4 must be a integer or null
			->test(4, 'int', 'null')
			//Argument 5 must be an integer
			->test(5, 'int');
			
		$this->memcache->addServer($host, $port, $persistent, $weight, $timeout);
		
		return $this;
	}
		
	/**
	 * Flushes the cache
	 *
	 * @return Eden\Memcache\Base
	 */
	public function clear()
	{
		$this->memcache->flush();
		
		return $this;
	}
	
	/**
	 * Gets a data cache
	 *
	 * @param string | array the key to the data
	 * @param int | null MemCache flag
	 * @return variable
	 */
	public function get($key, $flag = null)
	{
		//argument test
		Argument::i()
			//Argument 1 must be a string or array
			->test(1, 'string', 'array')
			//Argument 2 must be an integer or null
			->test(2, 'int', 'null');
		
		return $this->memcache->get($key, $flag);
	}

	/**
	 * deletes data of a cache
	 *
	 * @param string the key to the data
	 * @return Eden\Memcache\Base
	 */
	public function remove($key)
	{
		//Argument 1 must be a string or array
		Argument::i()->test(1, 'string', 'array');
		
		$this->memcache->delete($key);
		
		return $this;
	}

	/**
	 * Sets a data cache
	 *
	 * @param string the key to the data
	 * @param variable the data to be cached
	 * @param int | null MemCache flag
	 * @param int | null expire 
	 * @return bool
	 */
	public function set($key, $data, $flag = null, $expire = null)
	{
		//argument test
		Argument::i()
			//Argument 1 must be a string
			->test(1, 'string')
			//Argument 3 must be an integer or null
			->test(3, 'int', 'null')
			//Argument 4 must be an integer or null
			->test(4, 'int', 'null');
		
		$this->memcache->set($key, $data, $flag, $expire);
		
		return $this;
	}		
}