file = open("Python/text.txt", "r").read().strip().replace("\n"," ").replace("."," ").replace(","," ")
words = file.split(" ")
characters = file.split(" ")
staticsWords = {}
for word in words:
    try:
        staticsWords[word] += 1
    except:
        staticsWords[word] = 0
print(staticsWords)
    