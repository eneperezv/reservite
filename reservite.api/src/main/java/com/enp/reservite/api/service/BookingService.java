package com.enp.reservite.api.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Booking;
import com.enp.reservite.api.entity.Room;
import com.enp.reservite.api.repository.BookingRepository;
import com.enp.reservite.api.repository.RoomRepository;
import com.enp.reservite.api.util.FunctionsUtil;

@Service
public class BookingService {

	private final static Long ROOM_AVAILABLE = 1l;
	private final static Long ROOM_OCCUPIED  = 0l;
	
	@Autowired
	BookingRepository bookingRepository;
	
	@Autowired
	RoomRepository roomRepository;
	
	FunctionsUtil func = new FunctionsUtil();

	public Booking save(Booking booking) {
		StringBuilder sb = new StringBuilder();
		sb.append(System.currentTimeMillis())
		  .append(func.completaStringCeros(booking.getRoom().getRoomnumber(),"5"))
		  .append(func.completaStringCeros(Long.toString(booking.getClient().getId()),"5"));
		booking.setQrcode(func.retornaMD5(sb.toString()));
		
		Room room = roomRepository.findById(booking.getRoom().getId()).get();
		room.setStatus(ROOM_OCCUPIED);
		Room savedRoom = roomRepository.save(room);
		
		Booking savedBooking = bookingRepository.save(booking);
		savedBooking.setRoom(savedRoom);

		return savedBooking;
	}

	public List<Booking> findAll() {
		return bookingRepository.findAll();
	}

}
