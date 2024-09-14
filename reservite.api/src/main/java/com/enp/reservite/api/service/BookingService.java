package com.enp.reservite.api.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Booking;
import com.enp.reservite.api.repository.BookingRepository;
import com.enp.reservite.api.util.FunctionsUtil;

@Service
public class BookingService {
	
	@Autowired
	BookingRepository bookingRepository;
	
	FunctionsUtil func = new FunctionsUtil();

	public Booking save(Booking booking) {
		StringBuilder sb = new StringBuilder();
		sb.append(System.currentTimeMillis())
		  .append(func.completaStringCeros(booking.getRoom().getRoomnumber(),"5"))
		  .append(func.completaStringCeros(Long.toString(booking.getClient().getId()),"5"));
		booking.setQrcode(func.retornaMD5(sb.toString()));

		return bookingRepository.save(booking);
	}

	public List<Booking> findAll() {
		return bookingRepository.findAll();
	}

}
