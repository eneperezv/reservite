package com.enp.reservite.api.controller;

/*
 * @(#)AuthController.java 1.0 10/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase controller para Autentificacion vía TOKEN. El usuario debe existir en la base de datos
 *
 * @author eliezer.navarro
 * @version 1.0 | 10/09/2024
 * @since 1.0
 */

import java.util.Date;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.enp.reservite.api.entity.ErrorDetails;
import com.enp.reservite.api.entity.Token;
import com.enp.reservite.api.entity.UserMyDetails;
import com.enp.reservite.api.security.JwtService;
import com.enp.reservite.api.security.LoginForm;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;

@RestController
@RequestMapping("/api/v1/reservite")
public class AuthController {
	
	private static final Logger logger = LoggerFactory.getLogger(AuthController.class);
	
	@Autowired
    private AuthenticationManager authenticationManager;
    @Autowired
    private JwtService jwtService;
    @Autowired
    private UserMyDetails userDetailService;
	
	@PostMapping("/auth")
	public String authenticateAndGetToken(@RequestBody LoginForm loginForm) {
        Authentication authentication = authenticationManager.authenticate(new UsernamePasswordAuthenticationToken(
                loginForm.username(), loginForm.password()
        ));
        try {
        	if (authentication.isAuthenticated()) {
                return convertObjectToJson(new Token(jwtService.generateToken(userDetailService.loadUserByUsername(loginForm.username()))));
            } else {
            	return convertObjectToJson(new ErrorDetails(new Date(),HttpStatus.UNAUTHORIZED.toString(),"Credenciales no autorizadas"));
                //throw new UsernameNotFoundException("Invalid credentials");
            }
        }catch(Exception e) {
        	System.out.println("ERROR-->"+e.getMessage()+"<--");
        }
		return null;
    }
	
	private String convertObjectToJson(Object object) {
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            return objectMapper.writeValueAsString(object);
        } catch (JsonProcessingException e) {
            return "{\"error\": \"Error al convertir a JSON\"}";
        }
    }

}
