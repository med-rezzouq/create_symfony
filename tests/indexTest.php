<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */

    public function testHello()
    {

        $_GET['name'] = 'Lior';

        ob_start();

        include 'index.php';

        $content = ob_get_clean();


        $this->assertEquals('Hello Lior', $content);
    }
}
