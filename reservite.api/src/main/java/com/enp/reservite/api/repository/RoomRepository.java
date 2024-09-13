package com.enp.reservite.api.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.Room;

public interface RoomRepository extends JpaRepository<Room,Long> {
	
	//IMPLEMENTAR CONSULTA POR PISO Y NUMERO DE HABITACION. LOS DATOS VIENEN DE SERVICE
	@Query(value = "SELECT c.* FROM dbo_client c WHERE c.name LIKE %:nombre%", nativeQuery = true)
	List<Room> findRoomByRoomNumber(Long floor,Long number);

}
