def findMarker(c):
    file = open('day6.dat', 'r')
    line = file.readline()
    
    # print(line)

    for i in range(len(line) - (c-1)):
        chunk = line[i:i+c] 
        #print(chunk)
        chunkset = set()
        for ch in chunk:
            chunkset.add(ch)

        if (len(chunkset) == c):
            print(i + c)
            break


findMarker(4) 
findMarker(14)
