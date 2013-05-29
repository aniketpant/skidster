<?php

class HomeControllerTest extends TestCase {

	public function testGetHome()
	{
		$this->call('GET', '/');
    $this->assertResponseOk();
	}

	public function testGetNotes()
	{
		$this->call('GET', 'notes');
    $this->assertResponseOk();
	}

}