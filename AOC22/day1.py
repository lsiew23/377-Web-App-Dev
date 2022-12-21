def part2():
    file = open('day1.dat', 'r')
    lines = file.readlines()

    runningTotal = 0
    totals = []

    for line in lines:
        if (line.strip() == ''):
            totals.append(runningTotal)
            runningTotal = 0
        else:
            number = int(line.strip())
            runningTotal += number

    totals.sort()
    totals.reverse()

    print("Part 2: " + str(totals[0] + totals[1] + totals[2]))

part2()