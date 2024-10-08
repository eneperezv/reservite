package com.enp.reservite.api.entity;

/*
 * @(#)Room.java 1.0 11/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Entidad para gestion de habitación
 *
 * @author eliezer.navarro
 * @version 1.0 | 11/09/2024
 * @since 1.0
 */

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import jakarta.persistence.Basic;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;

@Entity
@Table(name="dbo_room")
public class Room {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Basic(optional = false)
	@Column(name="id_room", unique=true, nullable=false)
	private Long id;
	
	@JoinColumn(name = "id_hotel", nullable = false)
	@ManyToOne(targetEntity=Hotel.class, fetch=FetchType.LAZY)
	@JsonIgnoreProperties({"hibernateLazyInitializer", "handler"})
	private Hotel hotel;
	
	@Column(name="floor")
	private Long floor;
	
	@Column(name="number")
	private Long number;
	
	@Column(name="capacity")
	private Long capacity;
	
	@Column(name="description", length = 1500)
	private String description;
	
	@Column(name="roomnumber", length = 5)
	private String roomnumber;
	
	@Column(name="status")
	private Long status; //1-DISPONIBLE | 0-OCUPADA
	
	public Room() {
		
	}

	public Room(Hotel hotel, Long floor, Long number, Long capacity, String description, String roomnumber,
			Long status) {
		super();
		this.hotel = hotel;
		this.floor = floor;
		this.number = number;
		this.capacity = capacity;
		this.description = description;
		this.roomnumber = roomnumber;
		this.status = status;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Hotel getHotel() {
		return hotel;
	}

	public void setHotel(Hotel hotel) {
		this.hotel = hotel;
	}

	public Long getFloor() {
		return floor;
	}

	public void setFloor(Long floor) {
		this.floor = floor;
	}

	public Long getNumber() {
		return number;
	}

	public void setNumber(Long number) {
		this.number = number;
	}

	public Long getCapacity() {
		return capacity;
	}

	public void setCapacity(Long capacity) {
		this.capacity = capacity;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getRoomnumber() {
		return roomnumber;
	}

	public void setRoomnumber(String roomnumber) {
		this.roomnumber = roomnumber;
	}

	public Long getStatus() {
		return status;
	}

	public void setStatus(Long status) {
		this.status = status;
	}

	@Override
	public String toString() {
		return "Room [id=" + id + ", hotel=" + hotel + ", floor=" + floor + ", number=" + number + ", capacity="
				+ capacity + ", description=" + description + ", roomnumber=" + roomnumber + ", status=" + status + "]";
	}

}
