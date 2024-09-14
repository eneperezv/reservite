package com.enp.reservite.api.entity;

import java.util.Date;

import com.fasterxml.jackson.annotation.JsonFormat;
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
@Table(name="dbo_booking")
public class Booking {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Basic(optional = false)
	@Column(name="id_booking", unique=true, nullable=false)
	private Integer id;
	
	@JoinColumn(name = "id_room", nullable = false)
	@ManyToOne(targetEntity=Room.class, fetch=FetchType.LAZY)
	@JsonIgnoreProperties({"hibernateLazyInitializer", "handler"})
	private Room room;
	
	@JoinColumn(name = "id_client", nullable = false)
	@ManyToOne(targetEntity=Client.class, fetch=FetchType.LAZY)
	@JsonIgnoreProperties({"hibernateLazyInitializer", "handler"})
	private Client client;
	
	@Column(name="date_checkin")
	@JsonFormat(pattern = "yyyy-MM-dd HH:mm:ss")
	private Date dateCheckIn;
	
	@Column(name="date_checkout")
	@JsonFormat(pattern = "yyyy-MM-dd HH:mm:ss")
	private Date dateCheckOut;
	
	@Column(name="status")
	private Long status;
	
	public Booking() {
		
	}

	public Booking(Room room, Client client, Date dateCheckIn, Date dateCheckOut, Long status) {
		super();
		this.room = room;
		this.client = client;
		this.dateCheckIn = dateCheckIn;
		this.dateCheckOut = dateCheckOut;
		this.status = status;
	}

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public Room getRoom() {
		return room;
	}

	public void setRoom(Room room) {
		this.room = room;
	}

	public Client getClient() {
		return client;
	}

	public void setClient(Client client) {
		this.client = client;
	}

	public Date getDateCheckIn() {
		return dateCheckIn;
	}

	public void setDateCheckIn(Date dateCheckIn) {
		this.dateCheckIn = dateCheckIn;
	}

	public Date getDateCheckOut() {
		return dateCheckOut;
	}

	public void setDateCheckOut(Date dateCheckOut) {
		this.dateCheckOut = dateCheckOut;
	}

	public Long getStatus() {
		return status;
	}

	public void setStatus(Long status) {
		this.status = status;
	}

	@Override
	public String toString() {
		return "Booking [id=" + id + ", room=" + room + ", client=" + client + ", dateCheckIn=" + dateCheckIn
				+ ", dateCheckOut=" + dateCheckOut + ", status=" + status + "]";
	}

}
