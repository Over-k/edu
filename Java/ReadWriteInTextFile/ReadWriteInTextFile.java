package com.mycompany.readwriteintextfile;
import java.io.*;

public class ReadWriteInTextFile {
    
    static void Helper(String filePath, String fileName){
        String message;
        
        message = !new File(filePath).isDirectory() ? "Failed to find directory : "+filePath : "Directory is exists";
        System.out.println(message);
            
        if(new File(filePath).isDirectory() && !new File(filePath+fileName).isFile()){
            
            if(new File(filePath+"\\"+fileName).isFile()){
                filePath  = filePath + "\\";
            }
            else{
                CreateFile(filePath, fileName);
            }
        }
        message = !new File(filePath+fileName).isFile() ? "Failed to find file "+fileName : "File is exists";
        System.out.println(message);
    }
    
    static void CreateFile(String filePath, String fileName){
      try {
        File file = new File(filePath + fileName);
        if (file.createNewFile()) {
               System.out.println("File created: " + file.getName());
        } else {
            System.out.println("File already exists.");
        }
      } catch (IOException e) {
        System.out.println("An error occurred.");
      }
    }
    
    static void WriteFile(String filePath, String fileName, String text){
        try {
            FileWriter file = new FileWriter(filePath + fileName);
            file.write(text);
            file.close();
            System.out.println("Successfully wrote to the file.");
        } catch (IOException e) {
            System.out.println("An error occurred.");
        }
    }
    
    static void ReadFile(String filePath, String fileName) {
        int max_char = 10;
        char[] array = new char[max_char];
        try {
            FileReader reader = new FileReader(filePath + fileName);
            BufferedReader BufferedReader = new BufferedReader(reader);
            BufferedReader.read(array);
            System.out.println("Data in the file:");
            System.out.print(array);
            BufferedReader.close();
        } catch (Exception e) {
            System.out.println("Failed to find the file.");
        }
    }
    
    static void DeleteFile(String filePath, String fileName){
        File file = new File(filePath + fileName); 
        if (file.delete()) { 
            System.out.println("Deleted the file: " + file.getName());
        } else {
            System.out.println("Failed to delete the file.");
        } 
    }
    public static void main(String[] args) {
        String filePath = "C:\\Users\\yourName\\Desktop";
        String fileName = "text.txt";
        String text = "This is a line of text inside the file.";
        Helper(filePath,fileName);

        //CreateFile(filePath, fileName);
        //WriteFile(filePath, fileName, text);
        //ReadFile(filePath, fileName);
        //DeleteFile(filePath, fileName);
    }
}
