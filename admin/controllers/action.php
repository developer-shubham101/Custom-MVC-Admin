<?php
class Action extends Controller {
	function __construct() {
		parent::__construct ();
	}
	function index() {
	}
	function remove() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] )) {
				$action = $_POST ['action'];
				$json_array = array ();
				switch ($action) {

					case "deleteuser" :
						$json_array = $this->model->deleteRow ( $_POST, Help::USERS_TABLE );
						break;
					case "deleteevent" :
						$json_array = $this->model->deleteRow ( $_POST, Help::EVENTS_TABLE );
						break;
					case "deletenews" :
						$json_array = $this->model->deleteRow ( $_POST, Help::TABLE_PRESIDENT );
						break;
					case "deleteteam" :
						$json_array = $this->model->deleteRow ( $_POST, Help::TEAM_TABLE );
						break;
					case "deletegallery" :
							$json_array = $this->model->deleteRow ( $_POST, Help::GALLERY_TABLE );
							break;
					case "deleteguest" :
							$json_array = $this->model->deleteRow ( $_POST, Help::GUEST_TABLE );
							break;
					case "deletequestion" :
							$json_array = $this->model->deleteRow ( $_POST, Help::QUESTIONS_TABLE );
							break;
					default :
						$json_array = array (
								"error" => 1,
								"msg" => "No input found"
						);
						break;
				}
				echo json_encode ( $json_array );
			}
		}
	}
}