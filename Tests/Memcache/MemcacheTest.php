<?php //-->
/*
 * This file is part of the Memcache package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Memcache_Tests_Memcache_MemcacheTest extends \PHPUnit_Framework_TestCase
{
	public function testConstruct()
	{
		$memcache = eden('memcache');
		$this->assertInstanceOf('Eden\\Memcache\\Base', $memcache);
	}

	public function testDestruct()
	{
		$destruct = eden('memcache')->__destruct();
		$this->assertEmpty($destruct);
	}

	public function testAddServer()
	{
		$server = eden('memcache')->addServer();
		$this->assertTrue($server);
	}

	public function testClear()
	{
		$clear = eden('memcache')->clear();
		$this->assertInstanceOf('Eden\\Memcache\\Base', $claer);
	}

	public function testSet()
	{
		$set = eden('memcache')->set('test', 'testing');
		$this->assertTrue($set);
	}

	public function testGet()
	{
		eden('memcache')->set('test', 'testing');
		$get = eden('memcache')->get('test');
		$this->assertArrayHasKey('test', $get);
	}

	public function testRemove()
	{
		eden('memcache')->set('test', 'testing');
		$remove = eden('memcache')->set('test');
		$this->assertInstanceOf('Eden\\Memcache\\Base', $remove);
	}
}