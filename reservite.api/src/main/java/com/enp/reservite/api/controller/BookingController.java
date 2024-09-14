package com.enp.reservite.api.controller;

import java.util.Date;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.enp.reservite.api.entity.Booking;
import com.enp.reservite.api.entity.ErrorDetails;
import com.enp.reservite.api.service.BookingService;

@RestController
@RequestMapping("/api/v1/reservite")
public class BookingController {
	
	private static final Logger logger = LoggerFactory.getLogger(BookingController.class);
	
	@Autowired
	BookingService bookingService;
	
	@PostMapping("/booking")
	public ResponseEntity<?> createUsuario(@RequestBody Booking booking){
		Booking savedBooking;
		try{
			savedBooking = bookingService.save(booking);
			if(savedBooking == null) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NOT_FOUND.toString(),"Booking <"+booking+"> not created.");
				return new ResponseEntity<ErrorDetails>(err,HttpStatus.NOT_FOUND);
			}
			return new ResponseEntity<Booking>(savedBooking, HttpStatus.CREATED);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR");
			return new ResponseEntity<ErrorDetails>(err, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}

}
