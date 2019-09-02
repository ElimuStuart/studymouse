import os

file = os.listdir()
for i in file:
    if '.txt' in i:
        print(i)
