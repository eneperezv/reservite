package com.enp.reservite.api.controller;

/*
 * @(#)DashboardController.java 1.0 30/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase controller para gestion de reservas
 *
 * @author eliezer.navarro
 * @version 1.0 | 30/09/2024
 * @since 1.0
 */

import java.util.Date;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.enp.reservite.api.entity.Dashboard;
import com.enp.reservite.api.entity.ErrorDetails;
import com.enp.reservite.api.service.DashboardService;

@RestController
@RequestMapping("/api/v1/reservite")
public class DashboardController {
	
	private static final Logger logger = LoggerFactory.getLogger(DashboardController.class);
	
	@Autowired
	DashboardService dashboardService;
	
	@GetMapping("/dashboard")
	public ResponseEntity<?> findBookings(){
		Dashboard resultado = new Dashboard();
		try{
			resultado = dashboardService.getDashboardStats();
			//bookingService.findAll().forEach(lista::add);
			if(resultado == null) {
				ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.OK.toString(),"NO CONTENT");
				return new ResponseEntity<ErrorDetails>(err,HttpStatus.OK);
			}
			return new ResponseEntity<Dashboard>(resultado, HttpStatus.OK);
		}catch(Exception e){
			ErrorDetails err = new ErrorDetails(new Date(),HttpStatus.INTERNAL_SERVER_ERROR.toString(),"INTERNAL SERVER ERROR ->" + e.getMessage());
			return new ResponseEntity<ErrorDetails>(err, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}

}
