package com.mycompany.readwriteintextfile;
import java.io.*;

public class ReadWriteInTextFile {
    static void CreateFile(String fileName){
      try {
        File file = new File(fileName);
        if (file.createNewFile()) {
               System.out.println("File created: " + file.getName());
        } else {
            System.out.println("File already exists.");
        }
      } catch (IOException e) {
        System.out.println("An error occurred.");
      }
    }
    
    static void WriteFile(String fileName,String text){
        try {
            FileWriter file = new FileWriter(fileName);
            file.write(text);
            file.close();
            System.out.println("Successfully wrote to the file.");
        } catch (IOException e) {
            System.out.println("An error occurred.");
        }
    }
    
    static void ReadFile(String fileName) {
        char[] array = new char[50];
        System.out.println("Reading " + fileName + "...");
        try {
            FileReader reader = new FileReader(fileName);
            BufferedReader BufferedReader = new BufferedReader(reader);
            // Reads characters
            BufferedReader.read(array);
            System.out.println("Data in the file: ");
            System.out.println(array+"...");
            BufferedReader.close();
        } catch (Exception e) {
        }
    }
    
    static void DeleteFile(String fileName){
        File file = new File(fileName); 
        if (file.delete()) { 
            System.out.println("Deleted the file: " + file.getName());
        } else {
            System.out.println("Failed to delete the file.");
        } 
    }
    public static void main(String[] args) {
        
        String fileName = "Text.txt";
        String text = "This is a line of text inside the file.";
        
        CreateFile(fileName);
        WriteFile(fileName,text);
        ReadFile(fileName);
        //DeleteFile(fileName);
    }
}
