# Question 1
list00=[1,2,3,4,5,6,7,8,9,10]
x= 14 
if x in list00:
    print(" x :",x," kayna f L (list)",list00)
else:
    print(" x :",x,"makaynax f L (list)",list00)

# Question 2
list01=[1,2,2,3,4,5,6,7,7,8,9,10]
CheckList = []
for i in list01:
    if i in CheckList:
        print(i," m3awd.")
    else:
        CheckList.append(i)
lmjmo3 = 0
for i in list00:
    lmjmo3 += i
print("Lmjmo3 dyal had lista :",list00, " > howa : ",lmjmo3)