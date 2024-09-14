package com.enp.reservite.api.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.enp.reservite.api.entity.Booking;

public interface BookingRepository extends JpaRepository<Booking,Long> {

}
