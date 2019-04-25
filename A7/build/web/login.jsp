<%-- 
    Document   : login
    Created on : 23 Apr, 2019, 11:43:43 PM
    Author     : d_silent
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Login</h1>
        <form action="loginform.do" method="POST">
            Roll no <input type="text" name="rollno">
            Name <input type="text" name="name">
            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>
