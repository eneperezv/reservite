package com.enp.reservite.api.service;

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
		sb.append(func.completaStringCeros(Integer.toString(booking.getId()),"3"))
			.append(func.completaStringCeros(booking.getRoom().getRoomnumber(),"5"))
			.append(func.completaStringCeros(Long.toString(booking.getClient().getId()),"3"));
		booking.setQrcode(func.retornaMD5(sb.toString()));
		System.out.println(sb.toString());
		System.out.println(booking.toString());
		return bookingRepository.save(booking);
	}

}
