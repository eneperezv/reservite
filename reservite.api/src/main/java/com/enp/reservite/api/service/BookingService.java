package com.enp.reservite.api.service;

import java.io.IOException;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Booking;
import com.enp.reservite.api.entity.Client;
import com.enp.reservite.api.entity.Room;
import com.enp.reservite.api.repository.BookingRepository;
import com.enp.reservite.api.repository.ClientRepository;
import com.enp.reservite.api.repository.RoomRepository;
import com.enp.reservite.api.util.FunctionsUtil;
import com.google.zxing.WriterException;

import jakarta.mail.MessagingException;

@Service
public class BookingService {

	private final static Long ROOM_AVAILABLE = 1l;
	private final static Long ROOM_OCCUPIED  = 0l;
	private final static Long MAIL_SENT      = 1l;
	private final static Long MAIL_NOTSENT   = 0l;
	
	@Autowired
	BookingRepository bookingRepository;
	
	@Autowired
	RoomRepository roomRepository;
	
	@Autowired
	ClientRepository clientRepository;
	
	@Autowired
    QRCodeService qrCodeService;

    @Autowired
    EmailService emailService;
	
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
		
		Client client = clientRepository.findById(booking.getClient().getId()).get();
		
		Booking savedBooking = bookingRepository.save(booking);
		savedBooking.setRoom(savedRoom);
		savedBooking.setClient(client);
		
        try {
			byte[] qrCodeImage = qrCodeService.generateQRCodeImage(booking.getQrcode(), 400, 400);
			emailService.sendEmailWithQRCode(client.getEmail(), "Confirmación de Reserva", "Gracias por su reserva.", qrCodeImage);
			booking.setMailsent(MAIL_SENT);
		} catch (WriterException | IOException | MessagingException e) {
			booking.setMailsent(MAIL_NOTSENT);
			System.out.println("ERROR-->"+e.getMessage()+"<--");
			//e.printStackTrace();
		}

		return savedBooking;
	}

	public List<Booking> findAll() {
		return bookingRepository.findAll();
	}

}
