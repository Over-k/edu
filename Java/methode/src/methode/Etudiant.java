/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package methode;

/**
 *
 * @author lenovo
 */
public class Etudiant {

	String name;

	// Constructor Declaration of Class
	public Etudiant(String name)
	{
		this.name = name;
		
	}

	// method 1
	public String getName() { return name; }

	@Override public String toString()
	{
		return ("Hi my name is " + this.getName());
	}

}
