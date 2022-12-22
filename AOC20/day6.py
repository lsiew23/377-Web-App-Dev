def part1():
    unseen_characters = set()
    total = 0

    for line in letters:
        line = line.strip()  # remove leading and trailing whitespace
        if line == "":  # check if the line is empty and if it is not we do something
            total += len(unseen_characters)
            # print("setnum: ", unseen_characters)
            unseen_characters.clear()
        else:
            for character in line:
                # if character not in unseen_characters: 
                    unseen_characters.add(character)
                    
    total += len(unseen_characters) # must add one more time because loop will end before total 
                                    # can add unseen_characters again
    
    return total    

with open('day6.dat') as file:
    letters = [
        line
        for line in file.read().splitlines()
    ]
    # print(len(letters))
    print(part1())