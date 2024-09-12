package com.enp.reservite.api.repository;

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
