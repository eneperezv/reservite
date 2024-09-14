package com.enp.reservite.api.util;

import java.security.MessageDigest;

public class FunctionsUtil {
	
	public String retornaMD5(String str){
        String valor = "";
        
        try{
            MessageDigest md = MessageDigest.getInstance("MD5");
            md.update(str.getBytes());
            byte[] digest = md.digest();
            StringBuffer sb = new StringBuffer();
            for (byte b : digest) {
                sb.append(String.format("%02x", b & 0xff));
            }
            valor = sb.toString();
        }catch(Exception e){
        }
        
        return valor;
    }

}
