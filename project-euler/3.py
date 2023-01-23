import math

num = 600851475143

while num%2 == 0:
    lgf = 2
    num = num/2
for i in range(3, int(math.sqrt(num))+1, 2):
    while num%i == 0:
        lgf = i
        num = num / i
if num > 2:
    lgf = num
    
print(lgf)