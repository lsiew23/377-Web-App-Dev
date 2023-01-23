# import math

# list = range(1, 21)
# leastcommond = list[0]

# for i in list:
#     leastcommond = math.lcm(leastcommond, i)
# print(leastcommond)

# What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?

num = 1
i = 1
while i <= 20:
    if num % i == 0:
        i += 1
    else:
        num += 1
        i = 1

print(num)




    
    