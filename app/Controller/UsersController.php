<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function login() {
		
	}

	public function authenticate() {
		$this->autoRender = false;

		$username = trim($this->request->data['username']);
		
		$password = trim($this->request->data['password']);

		$row = $this->User->findByUsername($username);

		if($row['User']['password'] == $password) {

			$this->Session->write('id', $row['User']['id']);
            
            $this->Session->write('username', $row['User']['username']);

            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));

		}else {
			die('Login error');
		}
	}

	public function logout() {
 		$this->redirect(array('controller' => 'users', 'action' => 'login'));

	}

	public function dashboard() {
		$sql = "select * from invites where admin_id = 1 limit 20";
		$rows = $this->User->query($sql);	
		$this->set("invites",$rows);
	}

	public function invite() {
		$email_address = trim($this->request->data["email_address"]);
		$created = date('Y-m-d');
		$sql ="insert into invites (admin_id,email,created,status) values ('1','$email_address','$created','pending')";
		$this->User->query($sql);
		$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
	}

	public function accept_invite() {
		//http://localhost/easyemails/users/accept_invite?id=1
		$id = $this->request->query['id'];
		$sql = "select * from invites where id = '$id'";
		$row = $this->User->query($sql);
		
		if($row[0]['invites']['id'] == $id)  {
			$sql  = "update invites set status = 'accepted' where id = '$id'";
			$this->User->query($sql);
			$this->redirect(array('controller' => 'users', 'action' => 'user_login', 'id' => $id));

		}else {
			die("Error");
		}
	}

	public function user_login() {
		$id = $this->request->query['id'];
		$this->set("id",$id);
	}

	public function userupdate() {
		
		 $this->autoRender = false;

		$username = trim($this->request->data['username']);
		$password = trim($this->request->data['password']);
		$id = $this->request->data['id'];
		
		$sql = "select * from invites where id = '$id'";
		$row = $this->User->query($sql);
		$created = date('Y-m-d');

		if($row[0]['invites']['id'] == $id)  {
			$sql  = "insert into users 
				(username,password,roles,created, created_by, modified, modified_by)
				value ('$username','$password','contributer','$created','1','$created', '1')";
				
			$this->User->query($sql);
			$this->redirect(array('controller' => 'users', 'action' => 'thanks'));
			exit;

		}else {
			die("Error");
		}

	}

	public function thanks() {

	}

}
