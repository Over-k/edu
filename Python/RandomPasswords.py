import random

lowercase = "qwertyuiopasdfghjklzxcvbnm"
upcase = "QWERTYUIOPASDFGHJKLZXCVBNM"
numbers = "1234567890"
symbols = "!#$%&"

def generatePasswords():
    x = int(input("Enter lent of password : "))
    y = int(input("Many passwords : "))
    print("\n")
    print("-"*(x + 4))
    for i in range(y):
        password = ""
        for i in range(x):
            password += random.choice(random.choice([lowercase,upcase,symbols]))
        print(f"| {password} |")
    print("-"*(x + 4))
generatePasswords()
