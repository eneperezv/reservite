package com.enp.reservite.api.entity;

import jakarta.persistence.Basic;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name="dbo_dashboard")
public class Dashboard {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Basic(optional = false)
	@Column(name="id_dashboard", unique=true, nullable=false)
	private Integer id;
	
	@Column(name="clientsCount")
	private Long clientsCount;
	
	@Column(name="availableRoomsCount")
	private Long availableRoomsCount;
	
	@Column(name="bookingsCount")
	private Long bookingsCount;
	
	public Dashboard() {
		
	}
	
	public Dashboard(Long clientsCount, Long availableRoomsCount, Long bookingsCount) {
		super();
		this.clientsCount = clientsCount;
		this.availableRoomsCount = availableRoomsCount;
		this.bookingsCount = bookingsCount;
	}

	public Long getClientsCount() {
		return clientsCount;
	}

	public void setClientsCount(Long clientsCount) {
		this.clientsCount = clientsCount;
	}

	public Long getAvailableRoomsCount() {
		return availableRoomsCount;
	}

	public void setAvailableRoomsCount(Long availableRoomsCount) {
		this.availableRoomsCount = availableRoomsCount;
	}

	public Long getBookingsCount() {
		return bookingsCount;
	}

	public void setBookingsCount(Long bookingsCount) {
		this.bookingsCount = bookingsCount;
	}

	@Override
	public String toString() {
		return "Dashboard [clientsCount=" + clientsCount + ", availableRoomsCount=" + availableRoomsCount
				+ ", bookingsCount=" + bookingsCount + "]";
	}

}
