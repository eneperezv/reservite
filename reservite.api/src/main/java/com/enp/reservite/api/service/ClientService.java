package com.enp.reservite.api.service;

/*
 * @(#)ClientService.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Service para gestion de Clientes.
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Client;
import com.enp.reservite.api.repository.ClientRepository;

@Service
public class ClientService {
	
	@Autowired
	ClientRepository clientRepository;

	public Client save(Client client) {
		return clientRepository.save(client);
	}

	public List<Client> findByNombre(String nombre) {
		return clientRepository.findByNombre(nombre);
	}

	public List<Client> findAll() {
		return clientRepository.findAll();
	}

}
