text = "hello, world"

# capitalize() - Converts the first character to upper case
print(text.capitalize())  # Output: Hello, world

# casefold() - Converts string into lower case
print(text.casefold())  # Output: hello, world

# center() - Returns a centered string
print(text.center(20, '*'))  # Output: ****hello, world****

# count() - Returns the number of times a specified value occurs in a string
print(text.count('l'))  # Output: 3

# endswith() - Returns true if the string ends with the specified value
print(text.endswith('world'))  # Output: True

# expandtabs() - Sets the tab size of the string
print('hello\tworld'.expandtabs(4))  # Output: hello   world

# find() - Searches the string for a specified value and returns the position of where it was found
print(text.find('world'))  # Output: 7

# format() - Formats specified values in a string
print("My name is {name}".format(name="Alice"))  # Output: My name is Alice

# isalnum() - Returns True if all characters in the string are alphanumeric
print(text.isalnum())  # Output: False

# isalpha() - Returns True if all characters in the string are in the alphabet
print(text.isalpha())  # Output: False

# isdigit() - Returns True if all characters in the string are digits
print(text.isdigit())  # Output: False

# islower() - Returns True if all characters in the string are lower case
print(text.islower())  # Output: True

# isupper() - Returns True if all characters in the string are upper case
print(text.isupper())  # Output: False

# join() - Converts the elements of an iterable into a string
print('-'.join(['hello', 'world']))  # Output: hello-world

# lower() - Converts a string into lower case
print(text.lower())  # Output: hello, world

# upper() - Converts a string into upper case
print(text.upper())  # Output: HELLO, WORLD