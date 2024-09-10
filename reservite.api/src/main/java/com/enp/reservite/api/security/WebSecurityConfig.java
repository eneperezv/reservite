package com.enp.reservite.api.security;

import java.util.Date;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.http.HttpMethod;
import org.springframework.http.HttpStatus;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.AuthenticationProvider;
import org.springframework.security.authentication.ProviderManager;
import org.springframework.security.authentication.dao.DaoAuthenticationProvider;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configurers.AbstractHttpConfigurer;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.web.SecurityFilterChain;
import org.springframework.security.web.authentication.UsernamePasswordAuthenticationFilter;

import com.enp.reservite.api.entity.ErrorDetails;
import com.enp.reservite.api.entity.UserMyDetails;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;

import jakarta.servlet.http.HttpServletResponse;

@Configuration
@EnableWebSecurity
public class WebSecurityConfig {
	
	@Autowired
    private UserMyDetails userDetailService;
    @Autowired
    private JwtAuthenticationFilter jwtAuthenticationFilter;
    
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity httpSecurity) throws Exception {
        return httpSecurity
                .csrf(AbstractHttpConfigurer::disable)
                .authorizeHttpRequests(registry -> {
                    //registry.requestMatchers("/swagger-ui/**").permitAll();
                    //registry.requestMatchers("/v3/api-docs/**").permitAll();
                    registry.requestMatchers(HttpMethod.POST, "/api/v1/reservite/auth").permitAll();
                    /*
                    //USER
                    registry.requestMatchers(HttpMethod.GET,  "/api/v1/taskflow/user/**").hasRole("USER");
                    registry.requestMatchers(HttpMethod.POST, "/api/v1/taskflow/user/create").hasRole("USER");
                    registry.requestMatchers(HttpMethod.PUT,  "/api/v1/taskflow/user/update").hasRole("USER");
                    //TASK
                    registry.requestMatchers(HttpMethod.GET,  "/api/v1/taskflow/task").hasRole("USER");
                    registry.requestMatchers(HttpMethod.POST, "/api/v1/taskflow/task").hasRole("USER");
                    registry.requestMatchers(HttpMethod.PUT,  "/api/v1/taskflow/task").hasRole("USER");
                    //TASKFOLLOWUP
                    registry.requestMatchers(HttpMethod.GET,  "/api/v1/taskflow/task/followup/**").hasRole("USER");
                    registry.requestMatchers(HttpMethod.POST, "/api/v1/taskflow/task/followup").hasRole("USER");
                    registry.requestMatchers(HttpMethod.PUT,  "/api/v1/taskflow/task/followup").hasRole("USER");
                    */
                    registry.anyRequest().authenticated();
                })
                .formLogin(login -> login
                        .successHandler((request, response, authentication) -> {
                            response.setContentType("application/json");
                            response.getWriter().write("{\"message\": \"Autenticación exitosa\"}");
                        }))
                .exceptionHandling(handling -> handling
                        .authenticationEntryPoint((request, response, authException) -> {
                            response.setContentType("application/json");
                            response.setStatus(HttpServletResponse.SC_UNAUTHORIZED);
                            response.getWriter().write(convertObjectToJson(new ErrorDetails(new Date(),HttpStatus.UNAUTHORIZED.toString(),"Credenciales no autorizadas")));
                        }))
                .addFilterBefore(jwtAuthenticationFilter, UsernamePasswordAuthenticationFilter.class)
                .build();
    }

    @Bean
    public UserDetailsService userDetailsService() {
        return (UserDetailsService) userDetailService;
    }
    
    @Bean
    public AuthenticationProvider authenticationProvider() {
        DaoAuthenticationProvider provider = new DaoAuthenticationProvider();
        provider.setUserDetailsService((UserDetailsService) userDetailService);
        provider.setPasswordEncoder(passwordEncoder());
        return provider;
    }

    @Bean
    public AuthenticationManager authenticationManager() {
        return new ProviderManager(authenticationProvider());
    }

    @Bean
    public PasswordEncoder passwordEncoder() {
        return new BCryptPasswordEncoder();
    }
    
    private String convertObjectToJson(Object object) {
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            return objectMapper.writeValueAsString(object);
        } catch (JsonProcessingException e) {
            return "{\"error\": \"Error al convertir a JSON\"}";
        }
    }

}
