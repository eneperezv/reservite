package com.enp.reservite.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Client;
import com.enp.reservite.api.repository.ClientRepository;

@Service
public class ClientService {
	
	@Autowired
	ClientRepository clientRepository;

	public Client save(Client client) {
		// TODO Auto-generated method stub
		return null;
	}

	public Iterable<Client> findByNombre(String nombre) {
		// TODO Auto-generated method stub
		return null;
	}

}
