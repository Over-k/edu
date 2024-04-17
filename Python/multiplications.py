print("Multiplication Table:")

for i in range(0, 11):
    print(f"\n Multiplication of : {i}")
    print("---------------")
    for j in range(0, 11):
        result = i * j
        print(f"| {i:2} x {j:2} = {result:3} |")
    print("---------------")