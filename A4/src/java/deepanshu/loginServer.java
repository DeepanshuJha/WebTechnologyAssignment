
package deepanshu;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/login")
public class loginServer extends HttpServlet{
    public void service(HttpServletRequest req, HttpServletResponse res) throws IOException,ServletException {
        PrintWriter out = res.getWriter();
        
        int rollno = Integer.valueOf(req.getParameter("rollno"));
        String name = req.getParameter("name");
        
        try{
            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/user", "root", "");            
            Statement st;
            st = con.createStatement();
            ResultSet result = st.executeQuery("Select * from login");
            
            while(result.next()){
                if((int)result.getObject(1) == rollno && result.getObject(2).equals(name)){
                    res.sendRedirect("success.jsp");
                }
            }
            res.sendRedirect("failure.jsp");
        }catch(Exception e){
            out.println(e);
        }
    }
}
