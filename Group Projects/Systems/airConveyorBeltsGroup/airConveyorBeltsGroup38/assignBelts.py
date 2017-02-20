import copy
import sort

def belts2flights(belts,flights):
    """
    Belts assigned to flights.
    Requires: belts is a list of pairs, where the first component is the number
    of  the belt and the second component the next time this belt will be
    available,   sorted according to their increasing hour of availability, and
    flights is a list   of tuples, as described in the quizz, each corresponding
    to one flight, sorted   according to their increasing arrival time.
    Ensures: list of lists whose first element is a belt, the second the time
    when it is available, and the third a flight (represented as a tuple)
    """

    belt= copy.deepcopy(belts)
    nextVoo = copy.deepcopy(flights)
    listaFinal = []


    while len(nextVoo)!=0:
        listaFinal.append([belt[0][0],arrivalsHour(nextVoo)[0],nextVoo[0]])
        belt[0][1]=arrivalsHour(nextVoo)[0]
        nextVoo.pop(0)
        belt = sort.belts(belt)


    return listaFinal

def arrivalsHour(flights):
    """
    Time of end of the belts assigned to flights
    Requires: flights is a list   of tuples, as described in the quizz, each
    corresponding to one flight, sorted   according to their increasing arrival
    time.
    Ensures: list with the times when the belts corresponding to the flights are
    available
    """

    hora = []
    for i in range(len(flights)):
        hora.append(flights[i][2])

    d = []
    for k in hora:
        d.append(k.split(':'))
    t=[]
    for i in d:
        a=[]
        for j in i:
            a+=[int(j),]
        t+=[a,]

    minutos=[]
    for i in t:
        minutos.append(i[0]*60+i[1])


    arrivals=[]
    for i in range(len(flights)):
        arrivals.append((flights[i][4])*30/200+minutos[i])

    final=[]

    for i in arrivals:
        final.append(str(i/60)+':'+str(i%60))


    return final


def beltsTimes2flights(beltsflights):
    """
    Time of start and end of operation of belts assigned to flights, ensuring
    minimal time of wait for the passengers of each flight.
    Requires: beltsflights is a list of lists whose first element is a belt,
    the second the time when it is available, and the third a flight
    (represented as a tuple)
    Ensures: list of lists whose first element is a belt, the second the time
    when it starts into operation, the third when it stops, and the fourth the
    flight (represented as a tuple) delivering its lugages via that belt
    """

    lista=copy.deepcopy(beltsflights)
    for i in lista:
        i.insert(1,i[2][2])
    return lista



