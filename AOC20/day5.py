
def part1():
    maximum = 0
    for line in inputs:
        row = int(line[:7].replace("F", "0").replace("B", "1"), 2)
        collumn = int(line[-3:].replace("L", "0").replace("R", "1"), 2)
        maximum = max(maximum, row * 8 + collumn)
    return maximum

with open('day5.dat') as f:
    inputs = [
        line
        for line in f.read().splitlines()
    ]

    print(part1())
