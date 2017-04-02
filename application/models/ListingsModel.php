<?php

class ListingsModel extends CI_Model
{
	function getListingDetails($listing_no){
		$this->db->where('listing_id', $listing_no);
		$this->db-> from('listings');
		$query1 = $this->db->get();
		if ($query1-> num_rows() > 0){
			return $query1->result();    // return a array of object
		}	
		else{
			return NULL;	
		}
	}

	function getListingPics($listing_no){
		$this->db->where('listing_id', $listing_no);
		$this->db-> from('listingpics');
		$query1 = $this->db->get();
		if ($query1-> num_rows() > 0){
			return $query1->result();    // return a array of object
		}	
		else{
			return NULL;	
		}
	}

	function setConfirm($booking_id){
		$data = array(  
			'confirm_hotel' => 1,  
			);  
		$this->db->where('booking_id', $booking_id);  
		$this->db->update("booking", $data);  
	}

	function setIgnore($booking_id){
		$data = array(  
			'confirm_hotel' => 2,  
			);  
		$this->db->where('booking_id', $booking_id);  
		$this->db->update("booking", $data);  
	}

	function updateListingsDescription($listing_id,$data){
		$this->db->where('listing_id', $listing_id);  
		$this->db->update("listings", $data);  
	}

	function updateFacilities($listing_id,$data){
		$this->db->where('listing_id', $listing_id);  
		$this->db->update("listings", $data);  
	}



}