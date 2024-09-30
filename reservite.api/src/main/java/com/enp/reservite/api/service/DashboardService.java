package com.enp.reservite.api.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Dashboard;
import com.enp.reservite.api.repository.DashboardRepository;

@Service
public class DashboardService {
	
	@Autowired
	DashboardRepository dashboardRepository;
	
	public Dashboard getDashboardStats() {
        Object[] result = dashboardRepository.getDashboardStats();
        if (result != null && result.length > 0 && result[0] instanceof Object[]) {
            Object[] row = (Object[]) result[0];
            Long totalClientes = row[0] != null ? ((Number) row[0]).longValue() : 0L;
            Long habitacionesDisponibles = row[1] != null ? ((Number) row[1]).longValue() : 0L;
            Long totalReservas = row[2] != null ? ((Number) row[2]).longValue() : 0L;
            return new Dashboard(totalClientes, habitacionesDisponibles, totalReservas);
        } else {
            throw new IllegalStateException("Error al obtener datos del dashboard. Resultado inesperado.");
        }
    }

}
