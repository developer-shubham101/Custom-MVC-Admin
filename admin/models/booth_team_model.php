<?php
class Booth_Team_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}

	function export(){
		$constituencies = $this->db->get(Help::CONSTITUENCY_TABLE);
		$constituencyArray = array();
		foreach ($constituencies as $constituency) {
			$con = str_replace(" ", "_", str_replace("-", "_", strtolower(trim($constituency['name']))));
			$this->db->where(" constituency = '$con'");
			$mandles = $this->db->get(Help::MANDAL_TABLE);

			$mandleArray = array();
			foreach ($mandles as $mandle) {
				$mandleArray[] = new MandalObj($mandle['mandal_no'],$mandle['mandal_name'],new Ward("","",""));

			}
			$constituencyArray[] =  new Constituency($con,$mandleArray);
		}

		echo json_encode( $constituencyArray );

	}

	function inseartBoothMember() {

		$data = Array (
			
			
			// "constituency" => parent::getValue ( $_POST, "constituency" ),
			"ward_no" => parent::getValue ( $_POST, "wardno" ),
			// "mandal_no" => parent::getValue ( $_POST, "mandalno" ),
			"booth_no" => parent::getValue ( $_POST, "boothno" ),
			"booth_name" => parent::getValue ( $_POST, "boothname" ),
			"name" => parent::getValue ( $_POST, "mname" ),
			"address" => parent::getValue ( $_POST, "maddress" ),
			"designation" => parent::getValue ( $_POST, "mdesignation" ),
			"contact" => parent::getValue ( $_POST, "mcontact" ),
			"city" => parent::getValue ( $_POST, "mcity" )

			);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::BOOTH_TEAM_TABLE, $data );
			if ($id) {
				$output = array (
					"error" => 0,
					"msg" => "Member created",
					"booth_id" => $id
					);
			} else {
				$output = array (
					"error" => 1,
					"msg" => "Error to creating Member.."
					);
			}
		} else {
			$output = array (
				"error" => 1,
				"msg" => "database error.."
				);
		}

		return $output;
		// echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}

	function deleteBoothMember()
	{

		$id = parent::getValue($_GET, "boothteamid");
			//echo $id;
		$this->db->where('id', $id);
		if ($this->db->delete('bjp_booth_team'))
		{
			echo "successfully deleted";
		}

	}
}
