package com.enp.reservite.api.entity;

public class Dashboard {
	
	private Long clientsCount;
	private Long availableRoomsCount;
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
