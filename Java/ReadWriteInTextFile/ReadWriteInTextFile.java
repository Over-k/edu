/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.readwriteintextfile;
import java.io.*;
/**
 *
 * @author lenovo
 */
public class ReadWriteInTextFile {
    
    static void ReadFile(String filePath) {
        char[] array = new char[100];
        System.out.println("Reading " + filePath + "...");
        try {
            FileReader reader = new FileReader(filePath);
            BufferedReader BufferedReader = new BufferedReader(reader);
            // Reads characters
            BufferedReader.read(array);
            System.out.println("Data in the file: ");
            System.out.println(array);
            BufferedReader.close();
        } catch (Exception e) {
        }
    }
    public static void main(String[] args) {
        String filePath = "Text.txt";
        ReadFile(filePath);

        System.out.println("Hello World!");
    }
}
