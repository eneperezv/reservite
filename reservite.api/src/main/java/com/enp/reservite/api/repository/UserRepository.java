package com.enp.reservite.api.repository;

/*
 * @(#)UserRepository.java 1.0 10/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Interfase Repository para gestion de la persistencia JPA de Usuarios
 *
 * @author eliezer.navarro
 * @version 1.0 | 10/09/2024
 * @since 1.0
 */

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.enp.reservite.api.entity.User;

public interface UserRepository extends JpaRepository<User,Long> {
	
	Optional<User> findByUsername(String username);

	List<User> findAll();
	
	@Query(value = "SELECT * FROM dbo_users u WHERE u.username = :usuario", nativeQuery = true)
	User findByUsuario(String usuario);
	
	@Query(value = "SELECT * FROM dbo_users u WHERE u.id_user = :idusuario", nativeQuery = true)
	User findByIdUsuario(Long idusuario);

}
