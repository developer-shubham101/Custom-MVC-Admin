<?php
class Profile_Model extends Model {
	private $user_info = NULL;
	public function __construct() {
		parent::__construct ();	
		if (Session::get ( "loggedIn" )) {
			
			$statement = "SELECT * FROM `".Help::TABLE_ADMIN."` WHERE `id` = " . Help::getAdminId();
			$query = $this->db->query ( $statement );
			$this->user_info = $query->fetch ();
		}
	}
	public function updateAvatar($photo = array()) {		
		// Target siz
		$targ_w = $_POST ['targ_w'];
		$targ_h = $_POST ['targ_h'];
		if ($_POST ['w'] < 300 || $_POST ['h'] < 300) {
			$return ['err'] = 1;
			$return ['msg'] = "Please crope more then 300 X 300";
			
			return $return;
			// die();
		}
		
		// quality
		$jpeg_quality = 100;
		
		// photo path
		$src = $_POST ['photo_url'];
			
		// create new jpeg image based on the target sizes
		$img_r = imagecreatefromjpeg ( $src );
		$dst_r = ImageCreateTrueColor ( $targ_w, $targ_h );
		
		// crop photo
		imagecopyresampled ( $dst_r, $img_r, 0, 0, $_POST ['x'], $_POST ['y'], $targ_w, $targ_h, $_POST ['w'], $_POST ['h'] );

		$upload_dir = BASE_PATH . "photos/profiles";
		$md_dir = md5 ( $this->user_info ['email'] );
		$pathname = $upload_dir . "/" . $md_dir .'/avatar.jpg';
		
		// create the physical photo
		$is_updated = imagejpeg ( $dst_r, $pathname, $jpeg_quality );
		if ($is_updated) {
			
			$profile_url = "photos/profiles/" . $md_dir . "/avatar.jpg";
			$u_id = Help::getAdminId();		
			
			$statement_update = "UPDATE `".Help::TABLE_ADMIN."` SET `photo` = '$profile_url' WHERE `id` = $u_id ";
			$this->db->query( $statement_update );
			
			
			unlink ( $src );
			$return ['err'] = 0;
			$return ['msg'] = "Profile image successfully updated";

				
			return $return;
		}		
	}
	
	public function uploadAvatar($photo = array()) {
		if (! empty ( $photo ['name'] )) {
			
			$upload_dir = BASE_PATH . "photos/profiles";
			$md_dir = md5 ( $this->user_info ['email'] );
			$pathname = $upload_dir . "/" . $md_dir;
			
			if (! file_exists ( $pathname )) {
				mkdir ( $pathname );
			}
			
			$upload_photo = new upload ( $photo );
			
			if ($upload_photo->uploaded) {				
				$upload_photo->file_new_name_body = 'avatar2';
				
				$upload_photo->image_convert = "jpg";
				$upload_photo->image_min_width = 300;
				$upload_photo->image_min_height = 300;
				$upload_photo->file_auto_rename = false;
				$upload_photo->file_overwrite = true;	
				$upload_photo->file_max_size = "300K";
				$upload_photo->allowed = "image/*";
				$upload_photo->Process ( $pathname . "/" );
				if ($upload_photo->processed) {
					
					$photo = "photos/profiles/" . $md_dir . "/avatar2.jpg";
					

					$photo = str_replace ( '\\', "/", $photo );
					$upload_photo->Clean ();
					$return ['src'] = $photo;					
					return $return;
				} else {
					$return ['err'] = 1;
					$return ['msg'] = $upload_photo->error;
					
					return $return;
				}
			}
		}else{
			$return ['err'] = 1;
			$return ['msg'] = "Please select an image";
				
			return $return;
		}
	}
	public function updateUser($user_id, $user_details, $photo = array()) {
		$return = array ();
		$return ['err'] = 0;
		$return ['msg'] = "";
		
		if (! empty ( $user_id )) {
			
			$statement = "SELECT * FROM `".Help::TABLE_ADMIN."` WHERE `id` = " . $user_id;
			$query = $this->db->query ( $statement );
			$user_info = $query->fetch ();			
			
			$dob = $user_info ['dob'];
			/* $date 	= isset ( $user_details['date'] ) ? $user_details['date'] : "";
			$month 	= isset ( $user_details['month'] ) ? $user_details['month'] : "";
			$year 	= isset ( $user_details['year'] ) ? $user_details['year'] : "";
			
			if ($date && $month && $year ) {				
				$dob = date_format( date_create("$year-$month-$date") ,"Y-m-d" );
			}			 */
			
			$mobile 	= $this->getValues ( $user_details, "mobile", $user_info ['mobile'] );
			
			$name 		= $this->getValues ( $user_details, "name" , $user_info ['name']);
			$lname 		= $this->getValues ( $user_details, "lname" , $user_info ['lname']);
			$gender 	= $this->getValues ( $user_details, "gender" );
			$dob 		= $this->getValues ( $user_details, "dob", $user_info ['dob']);
			$address 	= $this->getValues ( $user_details, "address", $user_info ['address']);			
// 			$address2	= $this->getValues ( $user_details, "address2");
			$city		= $this->getValues ( $user_details, "city");
			$state		= $this->getValues ( $user_details, "state");
			$country	= $this->getValues ( $user_details, "country");
			$postcode	= $this->getValues ( $user_details, "postcode");	
			
			$photo 		= (! empty ( $photo ['name'] )) ? $photo : $user_info ['photo'];
			
			if (! empty ( $photo ['name'] )) {
				$upload_dir = BASE_PATH . "photos/profiles";
				$md_dir = md5 ( $user_info ['email'] );
				$pathname = $upload_dir . "/" . $md_dir;
				
				if (! file_exists ( $pathname )) {
					mkdir ( $pathname );
				}
				
				$upload_photo = new upload ( $photo );
				
				if ($upload_photo->uploaded) {
						// save uploaded image with a new name,
						// resized to 100px wide
					$upload_photo->file_new_name_body = 'avatar';
					$upload_photo->image_resize = true;
					$upload_photo->image_convert = "jpg";
					$upload_photo->image_x = 200;
					$upload_photo->image_ratio_y = true;
					$upload_photo->file_max_size = "300K";
					$upload_photo->file_auto_rename = false;
					$upload_photo->file_overwrite = true;
					$upload_photo->allowed = "image/*";
					$upload_photo->Process ( $pathname . "/" );
					if ($upload_photo->processed) {
						$photo = "photos/profiles/" . $md_dir . "/avatar.jpg";
						$upload_photo->Clean ();
					} else {
						$return ['err'] = 1;
						$return ['msg'] = $upload_photo->error;
						
						return $return;						
					}
				}
				
			}
			$update_values = array (
					'mobile' => $mobile,
					'name' => $name,
					'lname' => $lname,
					'gender' => $gender,
					'dob' => $dob,
					'address' => $address,
					'city'=>$city,
					'state' => $state,
					'country' => $country,
					'postcode'=>$postcode,
					'photo' => $photo
			);
			$where = array (
					'id' => $user_id 
			);
			
			/*$statement_update = "UPDATE `".Help::USER_TABLE."` SET
				
							`mobile` = :mobile,
							`name` = :name,
							`lname` = :lname,
							`gender` = :gender,
							`dob` = :dob,
							`address` = :address,							
							`city` = :city,
							`state` = :state,
							`country` = :country,
							`postcode` = :postcode,
							`photo` = :photo
					
							WHERE `id` = :id ";
			$update_user_pre = $this->db->prepare ( $statement_update );*/
			// if ($update_user_pre->execute ( $update_values )) {
			if ($this->updateData(Help::TABLE_ADMIN, $update_values, $where)) {	
				$return ['err'] = 0;
				$return ['msg'] = "Profile success fully updated";
			} else {
				$return ['err'] = 1;
				$return ['msg'] = "Error to update details";
			}
		} else {
			header ( "location: login" );
		}
		return $return;
	}
	function updatePassword($user_id, $passwords) {
	
		$return = array ();
		$return ['err'] = 0;
		$return ['msg'] = "";
	
		$p1 = $passwords['password1'];
		$p2 = $passwords['password2'];
		$p3 = $passwords['password3'];
	
		if ($p2 == $p3){
			$check_password =  $this->db->query("SELECT count(*) FROM `".Help::TABLE_ADMIN."` WHERE `id` = $user_id AND `password` = md5('$p1');")->fetch();
	
			if($check_password [0]){

				$update_values = array (						
						'password' => md5($p2)
				);
				$where = array (					
						'id' => $user_id 
				);

				// $pass_pre = $this->db->prepare("UPDATE `".Help::USER_TABLE."` SET `password` = md5(:p) WHERE `id` = :id");
				// $is_changed = $pass_pre->execute ( array (
				// 		'p' => $p2,
				// 		'id' => $user_id
				// ) );
				if ($this->updateData(Help::TABLE_ADMIN, $update_values, $where)) {
					$return ['err'] = 0;
					$return ['msg'] = "Password changed";
				}else {
					$return ['err'] = 1;
					$return ['msg'] = "Error to change password";
				}
			}else{
				$return ['err'] = 1;
				$return ['msg'] = "Please check your old password";
			}
				
		}else{
			$return ['err'] = 1;
			$return ['msg'] = "Password does not match ";
		}
		return $return;
	}
}