numbers = [531,123]
print("Some of digit in number.")
for number in numbers:
    sum = 0
    for digit in str(number):
        sum += int(digit)
    print(f"{number} >>> {sum}")