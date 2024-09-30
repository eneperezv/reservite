package com.enp.reservite.api.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.enp.reservite.api.entity.Notification;

public interface NotificationRepository extends JpaRepository<Notification,Long> {

	List<Notification> findAllByOrderByIdDesc();

}
