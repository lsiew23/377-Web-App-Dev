sumsquared = 0
squaredsum = 0
num2 = 0

for i in range(101):
    num = i**2
    # print(num)
    squaredsum += num

for i in range(101):
    num2 += i

sumsquared = num2**2


print(sumsquared - squaredsum)
