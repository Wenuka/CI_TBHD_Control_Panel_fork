<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditDetailsController extends CI_Controller {

	public function hotelDetails(){
		$this->load->library('session');
		$listing_no = $_SESSION['hotelno'];
		$this->load->model('ListingsModel');
		$listing =  $this->ListingsModel->getListingDetails($listing_no);
		$data= array('data1'=> $listing[0]->main_facilities, 'data2'=>$listing[0] );
		$this->load->view('hotel/hotelDetails',$data);

	}

	public function hotelPics(){
		$this->load->library('session');
		$listing_no = $_SESSION['hotelno'];
		$this->load->model('ListingsModel');
		$listing_pics =  $this->ListingsModel->getListingPics($listing_no);
		$data= array('data'=> $listing_pics );
		$this->load->view('hotel/hotelDetails',$data);
	}

	public function roomDetails(){
		$this->load->library('session');
		$listing_no = $_SESSION['hotelno'];
		$this->load->model('RoomModel');
		$rooms =  $this->RoomModel->getRoomDetails($listing_no);
		$data= array('data1'=> $rooms );
		// print_r($data);
		$this->load->view('hotel/updateRoomPrices',$data);

	}

	public function roomPics(){
		$this->load->library('session');
		$listing_no = $_SESSION['hotelno'];
		$this->load->model('ListingsModel');
		$listing_pics =  $this->ListingsModel->getListingPics($listing_no);
		$data= array('data'=> $listing_pics );
		$this->load->view('hotel/hotelDetails',$data);
	}

	public function viewMyAccount(){
		$this->load->library('session');
		$this->load->view('myAccount');
	}
	
	public function viewEditDetails(){
		$this->load->library('session');
		$this->load->view('hotel/editDetails');
	}

	public function updateHotelDescription(){
		$this->load->helper('form');
		$this->load->helper('url');
		$data1=array();
		if(isset($_POST['editor1'])){
			$this->load->model('ListingsModel');
			$this->load->library('session');
			if(isset($_SESSION)){
				$listing_id = $_SESSION['hotelno'];
			}
			$data1 = array(  
				'listing_desc' =>$_POST['editor1']
				);
			$this->ListingsModel->updateListingsDescription($listing_id,$data1);

		}
		$this->hotelDetails();

	}

	public function updateFacilities(){
		$this->load->helper('form');
		$this->load->helper('url');
		$data1=array();
		if(!empty($_POST['check_list'])) {
			$this->load->model('ListingsModel');
			$this->load->library('session');
			if(isset($_SESSION)){
				$listing_id = $_SESSION['hotelno'];
			}
			foreach($_POST['check_list'] as $check) {
				array_push($data1,$check);
			}
			$data = json_encode($data1);
		$data2 = array(  
				'main_facilities' =>$data
				);	
		$this->ListingsModel->updateFacilities($listing_id,$data2);
		}	
		$this->hotelDetails();

	}
	    public function photoUpload(){
	    	$this->load->library('session');
			// if(isset($_SESSION)){
				log_message('debug', print_r($_SESSION,true));
			// 	log_message('debug',$_SESSION['username']);
			// }
	    	// log_message('debug',"aaaaaaaaaaaabbbbbbbbbbbbaaaaaaaaaaaaa");
			// session_start();
			// isset($_SESSION['username'])
	    	if (isset($_SESSION['username'])){
		    	if (isset($_FILES["photo"])) { 
		    		// .$_SESSION['username']
		    		$name ="userPhoto_".$_SESSION['owner_id']."_".$_SESSION['username'];
		    		// if (isset($_SESSION['post']['listing_img_dir'])){
		    			// $dir = "backend/assets/images/users/";
		    		// }
		    		// else{
				    	// if ($_SESSION['post']['listing_type'] == 'hotel') {  
					    // 	$dir = "dest_".$_SESSION['post']['destination_id']."_".trim($_SESSION['post']['hotel_name'],' ');
					    // }
					    // else{
					    // 	$dir = "dest_".$_SESSION['post']['destination_id']."_".trim($_SESSION['post']['subject'],' ') ;
					    // }
					    // $_SESSION['post']['listing_img_dir'] = $dir;
					// }
					    // log_message('debug', print_r($_FILES,true));
					    // log_message('debug', $dir);
					    // log_message('debug',"doneeeeeeee");
					    $target_dir = "assets/images/users/";
					    if (!is_dir($target_dir)){
					    	mkdir($target_dir, 0777,true);
					    }
					    
					    $imageFileType = 'png';// pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
					    $name = $name.".".$imageFileType;  
					    $target_file = $target_dir . basename($name);   
					    $uploadOk = 1;
					    // print_r($_FILES)
					    log_message('debug', $target_file);
					    // Check if image file is a actual image or fake image
					    if(isset($_POST["submit"])) {
					        $check = getimagesize($_FILES["photo"]["tmp_name"]);
					        if($check !== false) {
					            // echo "File is an image - " . $check["mime"] . ".";
					            $uploadOk = 1;
					        } else {
					        	$_SESSION['error_page5'] = "File is not an image."; 
					        	// $this->load->view('new_listing/C5_photos');
					            // echo "File is not an image.";
					            $uploadOk = 0;
					        }
					    }
					    if ($_FILES["photo"]["size"] > 2000000) {
					    	$_SESSION['error_page5'] = "Sorry, your file is too large. Can you please upload photos which are smaler than 1.8MB, each."; 
					    	// $this->load->view('new_listing/C5_photos');
					        // echo "Sorry, your file is too large.";
					        $uploadOk = 0;
					    }
					    // Allow certain file formats
					    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					    && $imageFileType != "gif" ) {
					    	$_SESSION['error_page5'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
					    	// $this->load->view('new_listing/C5_photos');
					        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					        $uploadOk = 0;
					    }
					    // Check if $uploadOk is set to 0 by an error
					    if ($uploadOk == 0) {
					    	// $_SESSION['error_page5'] += "<br>your file was not uploaded."; 
					    	// $this->load->view('new_listing/C5_photos');
					        // echo "Sorry, your file was not uploaded.";
					        return false;
					    // if everything is ok, try to upload file
					    } 
					    else {
					        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
					        	// $_SESSION['error_page5'] = "Sorry, file already exists."; 
					    	    // $this->load->view('new_listing/C4_description');
					    	    // $_SESSION['post'][$imageArray][] = $name;
					    	    return true;
					            // echo "The file ". basename( $_FILES["photo"]["name"][$i]). " has been uploaded.";
					        } else {
					        	$_SESSION['error_page5'] = "Sorry, there was an unexpected error uploading your file."; 
					    	    // $this->load->view('new_listing/C5_photos');
					    	     return false;
					            // echo "Sorry, there was an error uploading your file.";
					        }
					    }
					    $this->load->model('LoginModel');
					    $path = "assets/images/users/".$name;
					    log_message('debug',$path);

					    $listing_pics =  $this->LoginModel->LoginPics($path, $_SESSION['owner_id']);
					    // $_SESSION['post']['imageNum'] = $_SESSION['post']['imageNum'] +1;
				}
			}
	    }
	


}