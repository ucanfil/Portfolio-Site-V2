<?php

require('../cms/htmlCreationFunctions.php');

use PHPUnit\Framework\TestCase;

class Cms extends TestCase {
    public $projects = [
        ['id'=> 4, 'title' => 'My Reads']
    ];
    // Success Tests
    public function testOKpopulateDropdown() {
        $html = populateDropdown($this->projects);
        $this->assertContains('</option>', $html);
    }

    public function testOKpopulateProject() {
        $html = populateProject($this->projects);
        $this->assertContains('</li>', $html);
        $this->assertContains('</h3>', $html);
    }
    // Failure Tests
    public function testFailurepopulateDropdown() {
        $projects = [[1, 4]];
        $html = populateDropdown($projects);
        $this->assertContains('</option>', $html);
    }

    public function testFailurepopulateProject() {
        $projects = [[1, 4]];
        $html = populateProject($projects);
        $this->assertContains('</li>', $html);
        $this->assertContains('</h3>', $html);
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
?>