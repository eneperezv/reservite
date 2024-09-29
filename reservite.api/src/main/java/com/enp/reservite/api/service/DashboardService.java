package com.enp.reservite.api.service;

import com.enp.reservite.api.entity.Dashboard;

public class DashboardService {
	
	@Autowired
	DashboardRepository dashboardRepository;

	public Dashboard getData() {
		return dashboardRepository.getData();
	}

}
