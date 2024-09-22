package com.enp.reservite.api.service;

/*
 * @(#)RoomService.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Service para gestion de Habitaciones.
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Room;
import com.enp.reservite.api.repository.RoomRepository;

@Service
public class RoomService {
	
	@Autowired
	RoomRepository roomRepository;

	public Room save(Room room) {
		return roomRepository.save(room);
	}

	public List<Room> findRoomByRoomNumber(String roomnumber) {
		/*
		if(roomnumber.length() == 3) {
			roomnumber += "0" + roomnumber;
		}
		Long floor  = Long.parseLong(roomnumber.substring(0,1));
		Long number = Long.parseLong(roomnumber.substring(2,3));
		*/
		return roomRepository.findRoomByRoomNumber(roomnumber);
	}

	public List<Room> findByHotel(Long hotel) {
		return roomRepository.findByHotel(hotel);
	}

}
