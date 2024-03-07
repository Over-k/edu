"""
exercise 06 Mars 
"""
def maxOfThreeNum():
    count = 0
    nums =[]
    while (count < 3): 
        count = count + 1
        num = input(f"Enter number {count}: ")
        nums.append(num)
    print("==================")
    print("Max number is : ",max(nums))

def noteStudents():
    count = 0
    students  =["Over-k","Namer mo9ana3", "Anonyms"]
    notes = []
    for student in students:
        note = int(input(f"Enter Note of {student}: "))
        notes.append(note)
        count = count + 1
    print("==================")
    for index, student in enumerate(students):
        m = "passable" if notes[index] <= 10 else "Good" if notes[index] <= 12 else "Very Good" if notes[index] <= 16 else "Nadi"
        print(f"| {student} Note {notes[index]} Mounting {m}")
    print("==================")
maxOfThreeNum()
noteStudents()   
