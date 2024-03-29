<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends TestCase
{
    public function test_index()
    {
        $output = $this->request('GET', 'welcome/index');
        $this->assertContains('<h1>Welcome to CodeIgniter!</h1>', $output);
    }
}
