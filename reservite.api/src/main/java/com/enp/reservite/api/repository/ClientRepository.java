package com.enp.reservite.api.repository;

/*
 * @(#)ClientRepository.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Interfase Repository para gestion de la persistencia JPA de Clientes
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.Client;

public interface ClientRepository extends JpaRepository<Client,Long> {
	
	@Query(value = "SELECT c.* FROM dbo_client c WHERE c.name LIKE %:nombre%", nativeQuery = true)
	List<Client> findByNombre(String nombre);

}
