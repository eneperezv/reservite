package com.enp.reservite.api.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Notification;
import com.enp.reservite.api.repository.NotificationRepository;

@Service
public class NotificationService {
	
	@Autowired
	NotificationRepository notificationRepository;
	
	public List<Notification> findAll() {
		return notificationRepository.findAll();
	}

}
