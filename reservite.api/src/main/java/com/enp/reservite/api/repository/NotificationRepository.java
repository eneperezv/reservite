package com.enp.reservite.api.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.enp.reservite.api.entity.Notification;

public interface NotificationRepository extends JpaRepository<Notification,Long> {

}
