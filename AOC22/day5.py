moves = []

def getCode():
    code = ''

    for stack in stacks:
        code = code + stack.pop()

    return code


def initializeStacks():
    # Snippet:
    # return [ ['Z', 'N'], ['M', 'C', 'D'], ['P'] ]

    # Full:
    return [ ['Z', 'J', 'N', 'W', 'P', 'S'],
             ['G', 'S', 'T'],
             ['V', 'Q', 'R', 'L', 'H'],
             ['V', 'S', 'T', 'D'],
             ['Q', 'Z', 'T', 'D', 'B', 'M', 'J'],
             ['M', 'W', 'T', 'J', 'D', 'C', 'Z', 'L'],
             ['D', 'P', 'R', 'Q', 'F', 'S', 'L', 'Z'],
             ['N', 'G', 'M', 'T', 'G', 'T', 'B', 'F', 'Q', 'H'],
             ['R', 'D', 'G', 'C', 'P', 'B', 'Q', 'W'] ]


def loadData():
    global moves

    file = open('day5.dat', 'r')
    lines = file.readlines()

    instruction = False
    for line in lines:
        line = line.strip()
        if (instruction):
            pieces = line.split()
            moveCount = int(pieces[1])
            moveFrom = int(pieces[3]) - 1
            moveTo = int(pieces[5]) - 1
            moves.append([moveCount, moveFrom, moveTo])
        elif (line == ''):
            instruction = True


def part1():
    count = 0

    for move in moves:
        # print(move)
        moveCount = move[0]
        moveFrom = move[1]
        moveTo = move[2]

        for i in range(moveCount):
            item = stacks[moveFrom].pop()
            stacks[moveTo].append(item)

        count = count + 1
        # showStacks(count)

    print("Part 1: " + getCode())


