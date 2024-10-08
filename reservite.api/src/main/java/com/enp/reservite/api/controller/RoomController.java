package com.enp.reservite.api.controller;

/*
 * @(#)RoomController.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase controller para gestion de habitaciones
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.enp.reservite.api.entity.Client;
import com.enp.reservite.api.entity.ErrorDetails;
import com.enp.reservite.api.entity.Room;
import com.enp.reservite.api.service.RoomService;

@RestController
@RequestMapping("/api/v1/reservite")
public class RoomController {
	
	private static final Logger logger = LoggerFactory.getLogger(RoomController.class);
	
	@Autowired
	RoomService roomService;
	
	@PostMapping("/room")
	public ResponseEntity<?> createUsuario(@RequestBody Room room){
		if (room.getRoomnumber() == null) {
		    StringBuilder roomNumberBuilder = new StringBuilder();
		    roomNumberBuilder.append(room.getFloor());
		    
		    String number = Long.toString(room.getNumber());
		    if(number.length() == 1){
		        roomNumberBuilder.append("0");
		    }
		    roomNumberBuilder.append(number);
		    
		    room.setRoomnumber(roomNumberBuilder.toString());
		}
		Room savedRoom;
		try{
			savedRoom = roomService.save(room);
			if(savedRoom == null) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NOT_FOUND.toString(),"Room <"+room+"> no existe");
				return new ResponseEntity<ErrorDetails>(err,HttpStatus.NOT_FOUND);
			}
			return new ResponseEntity<Room>(savedRoom, HttpStatus.CREATED);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR");
			return new ResponseEntity<ErrorDetails>(err, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@GetMapping("/room/by-number/{roomnumber}")
	public ResponseEntity<?> findRoomByRoomNumber(@PathVariable("roomnumber") String roomnumber){
		List<Room> lista = new ArrayList<Room>();
		try{
			roomService.findRoomByRoomNumber(roomnumber).forEach(lista::add);
			if(lista.isEmpty()) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NO_CONTENT.toString(),"NO CONTENT");
				return new ResponseEntity<>(err,HttpStatus.NO_CONTENT);
			}
			return new ResponseEntity<>(lista, HttpStatus.OK);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR");
			return new ResponseEntity<ErrorDetails>(err, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@GetMapping("/room/by-hotel/{hotel}")
	public ResponseEntity<?> findRoomByHotel(@PathVariable("hotel") Long hotel){
		List<Room> lista = new ArrayList<Room>();
		try{
			roomService.findByHotel(hotel).forEach(lista::add);
			if(lista.isEmpty()) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NO_CONTENT.toString(),"NO CONTENT");
				return new ResponseEntity<>(err,HttpStatus.NO_CONTENT);
			}
			return new ResponseEntity<>(lista, HttpStatus.OK);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR");
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}

}
