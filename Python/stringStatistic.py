text= str(input("entre le text : "))
for char in text:
    print(char + " : "+ str(text.count(char)))
    #text = text.strip(char)
    text = text.replace(char,"*")
    print(text)