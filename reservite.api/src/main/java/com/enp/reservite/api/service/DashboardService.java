package com.enp.reservite.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Dashboard;
import com.enp.reservite.api.repository.DashboardRepository;

@Service
public class DashboardService {
	
	@Autowired
	DashboardRepository dashboardRepository;

	public Dashboard getData() {
		Object[] result = dashboardRepository.getDashboardStats();
		
		Long totalClientes = Long.parseLong(result[0].toString());// ((Number) result[0]).longValue();
        Long habitacionesDisponibles = Long.parseLong(result[1].toString());// ((Number) result[1]).longValue();
        Long totalReservas = Long.parseLong(result[2].toString());// ((Number) result[2]).longValue();
        
        
		return new Dashboard(totalClientes,habitacionesDisponibles,totalReservas);
	}

}
