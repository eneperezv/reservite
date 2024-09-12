package com.enp.reservite.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.User;
import com.enp.reservite.api.repository.UserRepository;

@Service
public class UserService {
	
	@Autowired
	UserRepository userRepository;

	public User findByUsuario(String usuario) {
		return userRepository.findByUsuario(usuario);
	}

	public User save(User user) {
		return userRepository.save(user);
	}
	
	public User findByIdUsuario(Long idusuario) {
		return userRepository.findByIdUsuario(idusuario);
	}

}
