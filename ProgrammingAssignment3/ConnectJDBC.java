package lab3;

import java.sql.*;

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
			System.out.println("Error: Problems Creating Statement : \n" + e);
		}
	}
	
	public ResultSet query(String s) {
		
		ResultSet result = null;
		
		try{
			result = statement.executeQuery(s);
			System.out.println("Successful Query returned as type ResultSet");
		} catch (SQLException e){
			System.out.println("Error in Executing Query!: \n" + e);
		}
		
		return result;
	}
	
	public void insert(String s){
		try {
			statement.executeUpdate(s);
			System.out.println("Operation Complete!");
		} catch(SQLException e) {
			System.out.println("\nError: UnSuccesful Operation!\n" + e);
		}
	}
	
	public void update(String s){
		insert(s);
	}
	
	public void delete(String s){
		delete(s);
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
}
