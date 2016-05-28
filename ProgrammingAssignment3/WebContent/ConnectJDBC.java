package lab3;

import java.sql.*;
import java.util.ArrayList;

public class ConnectJDBC {
	private String databaseName;
	private String username;
	private	String password;
	private Connection connection;
	private Statement statement;
	
	public ConnectJDBC(){
		this.connection = null;
		this.statement = null;
		setDBName("inf124grp06");
		setUserName("root");
		setPassword("");
		connect();
		createStatement();
	}
	
	public ConnectJDBC (String dbName, String user, String pass) {
		this.connection = null;
		setDBName(dbName);
		setUserName(user);
		setPassword(pass);
		connect();
		createStatement();
	}
	
	public void connect(){
		try {
			this.connection = DriverManager.getConnection(databaseName, username, password);
			System.out.println("Connected");
		} catch (SQLException e) {
			System.out.println("Error: Cannot Connect to the Database : \n" + e);
		}
	}
	
	public void createStatement(){
		try {
			this.statement = connection.createStatement();
		} catch (SQLException e) {
			System.out.println("Error: Problems creating Statement : \n" + e);
		}
	}
	
	public ResultSet query(String q) {
		
		ResultSet result = null;
		
		try{
			return statement.executeQuery(q);	
		} catch (SQLException e){
			System.out.println("Error in result: \n" + e);
		}
		
		return result;
	}
	
	public String getDBName() {
		return databaseName;
	}
	
	public String getUserName() {
		return username;
	}
	
	public void setDBName(String name) {
		this.databaseName = "jdbc:mysql://localhost/" + name;
	}
	
	public void setUserName(String name) {
		this.username = name;
	}
	
	public void setPassword(String pass) {
		this.password = pass;
	}
	
//	public static void main(String [] args){
//		ConnectJDBC connection = new ConnectJDBC();
//		String s = "SELECT name FROM items"; 
//		
//		ResultSet x = connection.query(s);
//		try {
//			while(x.next()){
//				System.out.println(x.getString("name"));
//			}
//		}catch (SQLException e){
//			System.out.println("Error in result: \n" + e);
//		}
//	}
	
}
