with open("day1.dat") as f:
    list = [int(x.strip()) for x in f]

for i, n1 in enumerate(list):
    for j, n2 in enumerate(list[i+1:]):
        if n1 + n2 == 2020:
            print(n1 * n2)
        # for n3 in list[i+j+1:]:
        #     if n1 + n2 + n3 == 2020:
        #         print(n1 * n2 * n3)