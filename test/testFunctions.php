<?php

require('../cms/nonDbFunctions.php');

use PHPUnit\Framework\TestCase;

class Cms extends TestCase
{
    public $projects = [
        ['id'=> 4,
        'p_title' => 'My Reads',
        'bg_image_url' => '#',
        'p_content' => 'Content',
        'code_url' => '#',
        'see_url' => '#',
        ]
    ];
    // Success Tests
    public function testOKpopulateDropdown() {
        $html = populateDropdown($this->projects);
        $this->assertEquals('<option value="4">My Reads</option>', $html);
    }

    public function testOKpopulateProject() {
        $html = populateProject($this->projects);
        $this->assertContains('<li class="project project4"', $html);
        $this->assertContains('style="background-image: url(\'#\')">', $html);
        $this->assertContains('<h3>My Reads</h3>', $html);
        $this->assertContains('<p>Content</p>', $html);
        $this->assertContains('<a href="#" target="_blank">CODE</a>', $html);
        $this->assertContains('<a href="#" target="_blank">SEE ?</a>', $html);
    }

    public function testOKisKeyExist() {
        $keys = ['hello', 'world'];
        $array = ['world' => 1, 'hello' => 0];
        $this->assertEquals(true, isKeyExist($keys, $array));
    }

    // Failure Tests
    public function testFailurepopulateDropdown() {
        $projects = [[1, 4]];
        $html = populateDropdown($projects);
        $this->assertEquals('<option value=""></option>', $html);
    }

    public function testFailurepopulateProject() {
        $projects = [[1, 4]];
        $html = populateProject($projects);
        $this->assertContains('<li class="project project"', $html);
        $this->assertContains('style="background-image: url(\'\')">', $html);
        $this->assertContains('<h3></h3>', $html);
        $this->assertContains('<p></p>', $html);
        $this->assertContains('<a href="" target="_blank">CODE</a>', $html);
        $this->assertContains('<a href="" target="_blank">SEE ?</a>', $html);
    }

    public function testFailureisKeyExist() {
        $keys = ['hello', 'world', 'whats up'];
        $array = ['world' => 1, 'hello' => 0];
        $this->assertEquals(false, isKeyExist($keys, $array));
    }

    // Malformed Tests
    public function testMalformedpopulateDropdown() {
        $projects = '';
        $this->expectException(TypeError::class);
        $html = populateDropdown($projects);
    }

    public function testMalformedpopulateProject() {
        $projects = '';
        $this->expectException(TypeError::class);
        $html = populateProject($projects);
    }
}
