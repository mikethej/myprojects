"""
grupo n?38
n? 43104 Nome: Jorge Miguel Rodrigues Ferreira
n? 45095 Nome: Diana Paiva Marques
"""
def arrivalsFile(file_name):
    """
    Reads part of an input file with the arrivals into a list of flights.
    Requires: file_name, for arrivals, is a text file with the structure
    indicated in the quizz
    Ensures: list of tuples, each corresponding to one flight
    """

    f = open(file_name,'r')
    l = []
    for i in f.read().splitlines()[5:]:
        l.append((i,))
    return l

def flightLine(line):
    """
    Convert a line with a flight identification into a standard format.
    Requires: line is a string whose content correspond to one line/flight as
    indicated in the quizz (flight code, origin, arrival time, nb passengers,
    nb lugages), as in the example "TP539, Berlin, 08:40, 175, 237"
    Ensures: a tuple where each element corresponds to each element of the
    flight as indicated above
    """

    d = line
    d = d.replace(' ','')
    d = d.split(',')
    d[3]=int(d[3])
    d[4]=int(d[4])

    return tuple(d)

def headerArrivalsFile(file_name):
    """
    Reads the header of an input file with the arrivals into a string.
    Requires: file_name, for arrivals, is a text file with the structure
    indicated in the quizz
    Ensures: string representing the header of the file_name, including
    line breaks
    """

    f = open(file_name,'r')
    l = str()
    for i in f.read().splitlines()[:4]:
        l += i + '\n'
    return l


def operationReport(file_report):
    """
    Reads part of an input file with an operation report into a list of belts
    with the hours at which they are available to be used.
    Requires: file_report, for an operation report, is a text file with the
    structure indicated in the quizz
    Ensures: list of pairs, where the first component is the number of the
    belt and the second component the next time this belt will be available
    within the current period of operation
    """

    f = open(file_report,'r')
    l = []
    i=0
    inicio = f.read().splitlines()[5:]
    fim = inicio[i]
    while fim[0] != 'F': #check if the first word in the file in a 'F' to stop the loop
        fim = fim.replace(' ','')
        fim = fim.split(',')
        if len(fim) >= 3:
            l.append([fim[0],fim[2]])
        else:
            l.append([fim[0],fim[1]])
        i+=1
        fim = inicio[i]

    return l



