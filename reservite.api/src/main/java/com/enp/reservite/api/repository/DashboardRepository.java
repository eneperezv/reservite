package com.enp.reservite.api.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.Dashboard;

public interface DashboardRepository extends JpaRepository<Dashboard,Long> {
	
	@Query(value = "SELECT " +
            "(SELECT COUNT(*) FROM dbo_client) AS total_clientes, " +
            "(SELECT COUNT(*) FROM dbo_room WHERE status = 1) AS habitaciones_disponibles, " +
            "(SELECT COUNT(*) FROM dbo_booking) AS total_reservas", 
	    nativeQuery = true)
	Object[] getDashboardStats();

}
