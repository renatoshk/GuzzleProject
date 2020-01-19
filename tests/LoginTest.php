<?php
require '../App/Login.php';
require '../vendor/autoload.php';
class LoginTest extends PHPUnit\Framework\TestCase
{
    private $login;
    protected function setUp():void{
        $this->login = new \App\Login;
    }
    protected function tearDown():void{
        $this->login = NULL;
    }
    /**
     * @dataProvider authDataProvider
     * @dataProvider renatoDataProvider
     */
    public function testAuth($username, $password, $expected){
        $result = $this->login->auth($username, $password);
        $response = $result['action'];
        $this->assertEquals($expected, $response);
    }
     public function authDataProvider(){
        return [
            ['a1','1','success'],
            ['$##$%#%$##%#$#$#%$#%','1AAA','error'],
            ['a      \t \n lBBB','1','error'],
            ['asas','fssf','error'],
        ];
    }
     public function renatoDataProvider(){
        return [
            ['renato','renato','error'],
            ['a1','1','success'],
        ];
    }
}   