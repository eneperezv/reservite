package com.enp.reservite.api.repository;

/*
 * @(#)RoomRepository.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Interfase Repository para gestion de la persistencia JPA de Habitaciones
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.Room;

public interface RoomRepository extends JpaRepository<Room,Long> {
	
	@Query(value = "SELECT r.* FROM dbo_room r WHERE r.roomnumber = :roomnumber", nativeQuery = true)
	List<Room> findRoomByRoomNumber(String roomnumber);

	@Query(value = "SELECT r.* FROM dbo_room r WHERE r.id_hotel = :hotel AND r.status = 1", nativeQuery = true)
	List<Room> findByHotel(Long hotel);

}
