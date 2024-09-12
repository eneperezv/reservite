package com.enp.reservite.api.controller;

import java.util.Date;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.enp.reservite.api.entity.ErrorDetails;
import com.enp.reservite.api.entity.User;
import com.enp.reservite.api.service.UserService;

@RestController
@RequestMapping("/api/v1/reservite")
public class UserController {
	
	@Autowired
	UserService userService;
	
	@GetMapping("/user/{usuario}")
	public ResponseEntity<?> getUsuarioByName(@PathVariable("usuario") String usuario){
		User result;
		try{
			result = userService.findByUsuario(usuario);
			if(result == null) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NOT_FOUND.toString(),"Usuario <"+usuario+"> no existe");
				return new ResponseEntity<ErrorDetails>(err,HttpStatus.NOT_FOUND);
			}
			return new ResponseEntity<User>(result, HttpStatus.OK);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR");
			return new ResponseEntity<ErrorDetails>(err, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@PostMapping("/user")
	public ResponseEntity<?> createUsuario(@RequestBody User user){
		User savedUser;
		try{
			savedUser = userService.save(user);
			if(savedUser == null) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NOT_FOUND.toString(),"Usuario <"+user+"> no existe");
				return new ResponseEntity<ErrorDetails>(err,HttpStatus.NOT_FOUND);
			}
			return new ResponseEntity<User>(savedUser, HttpStatus.CREATED);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR");
			return new ResponseEntity<ErrorDetails>(err, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@PutMapping("/user")
	public ResponseEntity<?> updateUsuario(@RequestBody User user) {
	    try {
	    	User result = userService.findByIdUsuario(user.getId());
	        if (result == null) {
	            ErrorDetails err = new ErrorDetails(new Date(), HttpStatus.NOT_FOUND.toString(), "Usuario <" + user.getUsername() + "> no existe");
	            return new ResponseEntity<>(err, HttpStatus.NOT_FOUND);
	        }
	        result.setPassword(user.getPassword());

	        User savedUser = userService.save(user);
	        if(savedUser == null) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.NOT_FOUND.toString(),"Usuario <"+user+"> no existe");
				return new ResponseEntity<ErrorDetails>(err,HttpStatus.NOT_FOUND);
			}
			return new ResponseEntity<User>(savedUser, HttpStatus.OK);
	    } catch (Exception e) {
	        ErrorDetails err = new ErrorDetails(new Date(), HttpStatus.INTERNAL_SERVER_ERROR.toString(), "INTERNAL SERVER ERROR");
	        return new ResponseEntity<>(err, HttpStatus.INTERNAL_SERVER_ERROR);
	    }
	}

}
