# How to Install Java on Windows

Introduction

The Java Development Kit (**JDK**) is software used for `Java` programming, along with the Java Virtual Machine (**JVM**) and the Java Runtime Environment (**JRE**). The JDK includes the `compiler` and class libraries, allowing developers to create Java programs executable by the JVM and JRE.

**In this tutorial, you will learn to install the Java Development Kit on Windows.**

Prerequisites

- A system running Windows 10.
- A network connection.
- Administrator privileges.

## Check if Java Is Installed

1. Open a command prompt by typing cmd in the search bar and press **Enter**.
2. Run the following command:

```bash
java -version
```

## Download Java for Windows 10

Download the latest Java Development Kit installation file for Windows 10 to have the latest features and bug fixes.

1. Using your preferred web browser, navigate to the [Oracle Java Downloads page](https://www.oracle.com/java/technologies/downloads/#jdk17-windows).
2. On the *Downloads* page, click the **x64 Installer** download link under the **Windows** category. At the time of writing this article, Java version 17 is the latest long-term support Java version.

Wait for the download to complete.

## Install Java on Windows 10

After downloading the installation file, proceed with installing Java on your Windows system.

Follow the steps below:

### Step 1: Run the Downloaded File

Double-click the **downloaded file** to start the installation.

### Step 2: Configure the Installation Wizard

After running the installation file, the installation wizard welcome screen appears.

1. Click **Next** to proceed to the next step.

2. Choose the destination folder for the Java installation files or stick to the default path. Click **Next** to proceed.

3. Wait for the wizard to finish the installation process until the *Successfully Installed* message appears. Click **Close** to exit the wizard.

### Write a Test Java Script

1. Open a text editor such as Notepad++ and create a new file.

2. Enter the following lines of code and click **Save**:

```java
class HelloWorld{
    public static void main(String args[]){
        System.out.println("Hello world!");
        }
}
```
