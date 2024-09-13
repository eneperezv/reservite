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
	
	//IMPLEMENTAR CONSULTA POR PISO Y NUMERO DE HABITACION. LOS DATOS VIENEN DE SERVICE
	@Query(value = "SELECT c.* FROM dbo_client c WHERE c.name LIKE %:nombre%", nativeQuery = true)
	List<Room> findRoomByRoomNumber(Long floor,Long number);

}
