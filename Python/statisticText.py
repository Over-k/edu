fileName = "Python/text.txt"
file = open(fileName, "r").read().strip().replace("\n"," ").replace("."," ").replace(","," ")

def statistics(items):
    static = {}
    for item in items:
        if item.isalnum():
            try:
                static[item] += 1
            except:
                static[item] = 1
    sortedStatistic = sorted(static.items(),key=lambda x:x[1],reverse=True)
    return sortedStatistic

def printData(title, myData, basicInfo, printTable):
    print(title)
    if basicInfo:
        total = sum((col2 for _, col2 in myData))
        MaxItem = myData[0]
        MinItem = myData[-1]
        
        print("Total    : ",total)
        print(f"Max item : '{MaxItem[0]}' Repeated {MaxItem[1]} Percentage  {((MaxItem[1]*100)/total):.2f}%")
        print(f"Min item : '{MinItem[0]}' Repeated {MinItem[1]} Percentage  {((MinItem[1]*100)/total):.2f}%")

    if printTable:
        max_col1 = max(len(col1) for col1, _ in myData)
        max_col2 = len(str(max(col2 for _, col2 in myData)))
        print("="*(7+max_col1+max_col2))
        for row1, row2 in myData:
            print(f"| {row1:{max_col1}} | {row2:{max_col2}} |")
        print("_"*(7+max_col1+max_col2))
    print("."*50)

sortedWords = statistics(file.split(" "))
sortedCharacters = statistics(file)

printData("\nData of words :", sortedWords,True, False)
printData("\nData of characters :", sortedCharacters, True, False)