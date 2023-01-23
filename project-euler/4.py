largest = 0

for i in range(100, 1000):
    for j in range(100, 1000):
        num = i * j
        if str(num) == str(num)[::-1]:
            largest = max(largest, num)
    
print(largest)