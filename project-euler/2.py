def fibonacciSum(lim):
    list = [1,2]
    evenSum = 2
    while list[-1] <= lim:
        sequence = list[-1] + list[-2]
        if sequence > lim:
            break
        list.append(sequence)
        if sequence % 2 == 0:
            evenSum += sequence
    return evenSum

print(fibonacciSum(4_000_000))