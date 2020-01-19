<?php 
namespace App;
class Login
{
	private $username;
	private $password;
	private $response;
	public function getApiData(){
		$data = [
			'username'=> $this->username,
			'password'=> $this->password
	    ];
		$client = new \GuzzleHttp\Client([
			'base_uri' => ''
		]);
		$result = $client->post('', [
			'json' => ['body' => $data]
	    ]);
		return json_decode($result->getBody()->getContents(), true);
	}
	public function auth($username, $password){
		$this->username = $username;
		$this->password = $password;

		$result = $this->getApiData();

		if ($result['status']['code'] == 600) {
			$this->response = [
				'action' => 'success',
				'message' => $result['status']['message']
			];
		}else{
			$this->response = [
				'action' => 'error',
				'message' => $result['status']['message']
			];
		}

		return $this->response;

	}
}