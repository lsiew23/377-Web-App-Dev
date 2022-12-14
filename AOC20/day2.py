from collections import Counter

with open("day2.dat") as f:
    lines = [x.strip() for x in f]

part1 = 0
part2 = 0

for line in lines:
    chunks = line.split()
    bounds = chunks[0].split("-")
    lb, ub = int(bounds[0]), int(bounds[1])
    c = chunks[1][0]
    pw = chunks[2]

    counts = Counter(pw)[c]
    if lb <= counts <= ub:
        part1 += 1

    c_pos1, c_pos2 = pw[lb-1], pw[ub-1]
    if (c == c_pos1) ^ (c == c_pos2):
        part2 += 1

print("part 1: ", part1)
print("part 2: ", part2)