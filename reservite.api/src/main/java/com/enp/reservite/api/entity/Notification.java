package com.enp.reservite.api.entity;

import java.util.Date;

import com.fasterxml.jackson.annotation.JsonFormat;

import jakarta.persistence.Basic;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name="dbo_notification")
public class Notification {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Basic(optional = false)
	@Column(name="id_notification", unique=true, nullable=false)
	private Integer id;
	
	@Column(name="value", length = 100)
	private String value;
	
	@Column(name="date_notification")
	@JsonFormat(pattern = "yyyy-MM-dd HH:mm:ss")
	private Date date_notification;
	
	public Notification() {
		
	}

	public Notification(String value, Date date_notification) {
		super();
		this.value = value;
		this.date_notification = date_notification;
	}

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getValue() {
		return value;
	}

	public void setValue(String value) {
		this.value = value;
	}

	public Date getDate_notification() {
		return date_notification;
	}

	public void setDate_notification(Date date_notification) {
		this.date_notification = date_notification;
	}

	@Override
	public String toString() {
		return "Notification [id=" + id + ", value=" + value + ", date_notification=" + date_notification + "]";
	}

}
