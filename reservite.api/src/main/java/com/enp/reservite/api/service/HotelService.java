package com.enp.reservite.api.service;

import java.util.List;

/*
 * @(#)HotelService.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Service para gestion de Hoteles.
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Hotel;
import com.enp.reservite.api.repository.HotelRepository;

@Service
public class HotelService {
	
	@Autowired
	HotelRepository hotelRepository;

	public Hotel save(Hotel hotel) {
		return hotelRepository.save(hotel);
	}

	public List<Hotel> findAll() {
		return hotelRepository.findAll();
	}

}
