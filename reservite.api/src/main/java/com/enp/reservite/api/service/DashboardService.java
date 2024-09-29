package com.enp.reservite.api.service;

import java.util.Arrays;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.enp.reservite.api.entity.Dashboard;
import com.enp.reservite.api.repository.DashboardRepository;

@Service
public class DashboardService {
	
	@Autowired
	DashboardRepository dashboardRepository;
	public Dashboard getDashboardStats() {
        // Obtener los datos del repositorio
        Object[] result = dashboardRepository.getDashboardStats();

        // Log de los resultados para depuración
        System.out.println("Resultado crudo de la consulta: " + Arrays.toString(result));

        // Verificar que el resultado es un array de arrays
        if (result != null && result.length > 0 && result[0] instanceof Object[]) {
            Object[] row = (Object[]) result[0];  // Obtener la primera fila de resultados

            // Convertir los resultados a Long manejando nulos
            Long totalClientes = row[0] != null ? ((Number) row[0]).longValue() : 0L;
            Long habitacionesDisponibles = row[1] != null ? ((Number) row[1]).longValue() : 0L;
            Long totalReservas = row[2] != null ? ((Number) row[2]).longValue() : 0L;

            return new Dashboard(totalClientes, habitacionesDisponibles, totalReservas);
        } else {
            // Manejo de error si los resultados son inesperados
            throw new IllegalStateException("Error al obtener datos del dashboard. Resultado inesperado.");
        }
    }
	/*
	public Dashboard getData() {
		Object[] result = dashboardRepository.getDashboardStats();
		
		Long totalClientes = Long.parseLong(result[0].toString());// ((Number) result[0]).longValue();
        Long habitacionesDisponibles = Long.parseLong(result[1].toString());// ((Number) result[1]).longValue();
        Long totalReservas = Long.parseLong(result[2].toString());// ((Number) result[2]).longValue();
        
        
		return new Dashboard(totalClientes,habitacionesDisponibles,totalReservas);
	}
	*/
}
