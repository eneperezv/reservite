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
		return dashboardRepository.getData();
	}

}
