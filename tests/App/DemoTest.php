<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use PHPUnit\Framework\TestCase;
use App\App\Demo;
use App\Util\HttpRequest;

class DemoTest extends TestCase 
{
    public function test_foo() {

    }

    public function testGetUserInfo() {
        // $result = (new HttpRequest)->get(Demo::URL);
        $result = '{"error": 0, "data": { "id": 1, "username": "hello world" } }';
        $result_arr = json_decode($result, true);
        
        $this->assertArrayHasKey('error', $result_arr);
        $this->assertEquals($result_arr['error'], 0);

        $this->assertArrayHasKey('data', $result_arr);
        $this->assertTrue(is_array($result_arr['data']));
    }
}