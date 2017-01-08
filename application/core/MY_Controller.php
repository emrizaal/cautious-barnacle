<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}

	public function sendEmail($p){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'jangngetes21@gmail.com',
			'smtp_pass' => '##jangngetes',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
			);

		$message = '

		Dear '.$p['nama'].',

		Thank you for signing up with us. Your new account has been setup and you can now login to our client area using the details below.

		username: '.$p['username'].'
		Password: '.$p['password'].'

		To login, visit https: xxxxx

		Note : Please do not reply directly to this email, reply to the email address below (signature) if you want to reply this email.

		Best Regards
		';
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('jangngetes21@gmail.com');
		$this->email->to($p['email']);
		$this->email->subject('[Kajian-Go Account]');
		$this->email->message($message);
		/*
		if($this->email->send())
		{
			echo 'Email sent.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
		*/

	}

	public function getAllByIdMosque($tabel,$key,$id){
		$res=$this->m_kajian->getAllByIdMosque($tabel,$key,$id);
		print(json_encode(array('collection'=>$res)));
	}
}

?>
