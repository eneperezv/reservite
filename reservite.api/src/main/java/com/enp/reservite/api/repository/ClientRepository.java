package com.enp.reservite.api.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.enp.reservite.api.entity.Client;

public interface ClientRepository extends JpaRepository<Client,Long> {

}
