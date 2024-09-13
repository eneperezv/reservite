package com.enp.reservite.api.service;

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
		//IMPLEMENTAR CONFIGURACION DE PISO Y NUMERO DE HABITACION PARA CONSULTA. ENVIAR DATOS AL REPOSITORY
		return roomRepository.findRoomByRoomNumber(1l,1l);
	}

}
