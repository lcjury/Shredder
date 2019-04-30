<?php
use PHPUnit\Framework\TestCase;

class php extends TestCase
{
    private $extractor;

    protected function setUp() : void
    {
        $this->extractor = new \Lcjury\Shredder\EmailExtractor();
    }

    public function testEmailExtraction()
    {
        $emails = $this->extractor->getEmailsFromString('x email@gmail.com y');
        $this->assertContains('email@gmail.com', $emails);
    }

    public function testEmailExtractionWithInvalidCharacters()
    {
        $emails = $this->extractor->getEmailsFromString('x:email@gmail.com,y');
        $this->assertContains('email@gmail.com', $emails);
    }
}