import copy
from readInput import *
def flights(arrivals):
    """
    Sorted list of flights according to their increasing hour of arrival.
    Requires: arrivals is a list of tuples, each corresponding to one flight
    Ensures: list of tuples, each corresponding to one flight, sorted according
    to their increasing arrival time.
    """
    lista = []
    for i in arrivals:
        lista.append(flightLine(i[0]))

    numlista = []
    for i in range(len(lista)):
        numlista.append(lista[i][2])

    numtemp=copy.deepcopy(numlista)
    numlista.sort()

    listaFinal = []
    for i in range(len(lista)):
        listaFinal.append(lista[numtemp.index(numlista[i])])
        #pega na posicao da lista ordenada e vai verificar qual a sua posi?ao
        #na lista original usando como index a lista das horas

    return listaFinal

def belts(belts):
    """
    Sorted list of belts according to their increasing hour of availability.
    Requires: belts is a list of pairs, where the first component is the number
    of   the belt and the second component the next time this belt will be
    available   within the current period of operation
    Ensures: list of pairs, each corresponding to one belt, sorted according
    to their increasing hour of availability.
    """

    listaFinal = []
    numlista = []
    for i in range(len(belts)):
        numlista.append(belts[i][1])



    numtemp=copy.deepcopy(numlista)
    numlista.sort()


    for i in range(len(belts)):
        listaFinal.append(belts[numtemp.index(numlista[i])])
        #pega na posicao da lista ordenada e vai verificar qual a sua posicao
        #na lista original usando como index a lista das horas

    for i in listaFinal:
        if i[1] =='not_used':
            listaFinal.insert(0,i)
            listaFinal.pop()


    return listaFinal

