""" calc somme of two numbers"""
def calc(a,b):
    print(a+b)

"""calc average of three numbers"""
def average(a,b,c):
    print((a+b+c)/3)

"""euro to mad """
def converter(currency,a):
    print(a," ",currency)
    a = a * 10.8 if currency == "mad" else a / 10.8
    currency = "euro" if currency == "mad" else "euro"
    print(a," ",currency)
    
"""switch between two variables"""
def switch(a,b):
    print("a:", a)
    print("b:", b)
    a, b = b, a
    print("a:", a)
    print("b:", b)

a,b,c = 1,2,3
print("------")
calc(a,b)
print("------")
average(a,b,c)
print("------")
converter("mad",a)

print("------")
switch(a,b)