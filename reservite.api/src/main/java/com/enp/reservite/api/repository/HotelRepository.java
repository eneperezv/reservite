package com.enp.reservite.api.repository;

/*
 * @(#)HotelRepository.java 1.0 12/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Interfase Repository para gestion de la persistencia JPA de Hoteles
 *
 * @author eliezer.navarro
 * @version 1.0 | 12/09/2024
 * @since 1.0
 */

import org.springframework.data.jpa.repository.JpaRepository;

import com.enp.reservite.api.entity.Hotel;

public interface HotelRepository extends JpaRepository<Hotel,Long> {

}
