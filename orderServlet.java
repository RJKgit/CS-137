import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import foogleObject.Item;

/**
 * Servlet implementation class orderServlet
 */
@WebServlet("/orderServlet")
public class orderServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public orderServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doPost(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    	response.setContentType("text/html");
		
        //JDBC Connection
        String sqlLogin = "testuser";
        String sqlPass = "testpass";
        String sqlURL = "jdbc:mysql://127.0.0.1:3306/inf124grp06";
        Connection connection;
        Statement stmt;
        
        List<Item> cart = (List<Item>) request.getSession().getAttribute("cart");
        String fn = request.getParameter("first");
        String ln = request.getParameter("last");
        String email = request.getParameter("email");
        String phone = request.getParameter("phone");
        String creditcard = request.getParameter("card");
        String street = request.getParameter("street");
        String city = request.getParameter("city");
        String state = request.getParameter("state");
        String zip = request.getParameter("zip");
        String ship = request.getParameter("ship");
        String total = request.getParameter("total");
        
        try{
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            connection = DriverManager.getConnection(sqlURL, sqlLogin, sqlPass);
            stmt = connection.createStatement();
               
            /*String query = "INSERT INTO customers (id, first_name, last_name, email, phone_number, street_address, city, state, zipcode, creditcard_number)" 
            		+ "VALUES (NULL, '" + fn + "', '" + ln + "', '" + email + "', '" + phone + "', '" + street
            		+ "', '" + city + "', '" + state + "', '" + zip + "', '" + creditcard + "')";
            
            int rs = stmt.executeUpdate(query);*/
   	        

			
			connection.close();
			
			request.getRequestDispatcher("/order.jsp").forward(request, response);
			
        }catch(Exception e){
          	PrintWriter out = response.getWriter();
        	out.println("ERROR");
        }
	}

}
