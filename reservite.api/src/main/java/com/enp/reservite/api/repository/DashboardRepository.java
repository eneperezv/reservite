package com.enp.reservite.api.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.Dashboard;

public interface DashboardRepository extends JpaRepository<Dashboard,Long> {
	
	@Query(value = "SELECT "
					+ "(SELECT COUNT(*) FROM dbo_client)"
					+ "(SELECT COUNT(*) FROM dbo_room WHERE status = 1),"
					+ "(SELECT COUNT(*) FROM dbo_booking)", nativeQuery = true)
	Dashboard getData();

}
