fileName = "Python/text.txt"

# words
file = open(fileName, "r").read().lower().strip().replace("\n"," ").replace("."," ").replace(","," ")
words = file.split(" ")
staticsWords = {}
for word in words:
    if "" != word:
        try:
            staticsWords[word] += 1
        except:
            staticsWords[word] = 1
sortedWords = sorted(staticsWords.items(),key=lambda x:x[1],reverse=True)

# characters
characters = file
staticsCharacters = {}
for character in characters:
    if character.isalnum():
        try:
            staticsCharacters[character] += 1
        except:
            staticsCharacters[character] = 1
sortedCharacters = sorted(staticsCharacters.items(),key=lambda x:x[1],reverse=True)

def tablePrint(title,myData):
    print(title)
    max_col1 = max(len(col1) for col1, _ in myData)
    max_col2 = len(str(max(col2 for _, col2 in myData)))
    print("="*(7+max_col1+max_col2))
    for row1, row2 in myData:
        print(f"| {row1:{max_col1}} | {row2:{max_col2}} |")
    print("_"*(7+max_col1+max_col2))

tablePrint("\nData of characters :", sortedCharacters)
tablePrint("\nData of words :", sortedWords)