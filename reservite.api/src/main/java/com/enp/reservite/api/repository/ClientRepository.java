package com.enp.reservite.api.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.Client;

public interface ClientRepository extends JpaRepository<Client,Long> {
	
	@Query(value = "SELECT c.* FROM dbo_client c WHERE c.name LIKE %:nombre%", nativeQuery = true)
	List<Client> findByNombre(String nombre);

}
