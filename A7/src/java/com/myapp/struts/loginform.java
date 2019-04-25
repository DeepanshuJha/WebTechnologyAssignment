/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.myapp.struts;

import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionForward;
import org.apache.struts.action.ActionMapping;

/**
 *
 * @author d_silent
 */
public class loginform extends org.apache.struts.action.Action {

    /* forward name="success" path="" */
    private static final String SUCCESS = "success";
    private static final String FAILURE = "failure";

    /**
     * This is the action called from the Struts framework.
     *
     * @param mapping The ActionMapping used to select this instance.
     * @param form The optional ActionForm bean for this request.
     * @param request The HTTP Request we are processing.
     * @param response The HTTP Response we are processing.
     * @throws java.lang.Exception
     * @return
     */
    @Override
    public ActionForward execute(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        
        PrintWriter out = response.getWriter();
        
        loginbean lb = (loginbean)form;
        
        int rollno = Integer.valueOf(lb.getRollno());
        String name = lb.getName();
        
        Class.forName("com.mysql.jdbc.Driver");
        Connection con;
        try{
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/user", "root", "");
            Statement st;
            st = con.createStatement();
            ResultSet resu;
            resu = st.executeQuery("Select * from login");
            
            while(resu.next()){
                if((int)resu.getObject(1) == rollno && resu.getObject(2).equals(name)){
                    return mapping.findForward(SUCCESS);                    
                }
            }
            return mapping.findForward(FAILURE);
        }catch(Exception e){
            out.println(e);
        }
        
        return mapping.findForward(FAILURE);
    }
}
