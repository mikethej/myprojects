"""
grupo n?38
n? 43104 Nome: Jorge Miguel Rodrigues Ferreira
n? 45095 Nome: Diana Paiva Marques
"""

from assignBelts import *
import copy

def operationReport(inputFile, beltsflights, outputFile):
    """
    The file with the operation report.
    Requires: inputFile, for arrivals, is a text file with the structure
    indicated in the  quizz, beltsflights is list of lists whose first element
    is a belt, the second the time when it starts into operation, the third when
    it stops, and the fourth the flight (represented as a tuple) delivering its
    lugages via that belt, and outputFile is a text file where the operation
    report will be written
    Ensures: text file with the operation report as described in the quizz
    """
    voosOrganizados = copy.deepcopy(beltsflights)
    voosOrganizados.sort()

    arrivals=open(inputFile,'r')
    lista=[]
    operations=open(outputFile,'w')
    for i in arrivals.read().splitlines()[:4]:
        operations.write(i)
        operations.write('\n')


    operations.write('Belts: \n')

    for i in range(len(voosOrganizados)): # write the blets part in the new file
        linhaLimpa = str(voosOrganizados[i])
        linhaLimpa = linhaLimpa.replace('[','')
        linhaLimpa = linhaLimpa.replace(']','')
        linhaLimpa = linhaLimpa.replace("'",'')
        operations.write(linhaLimpa)
        operations.write('\n')


    operations.write('Flights: \n')

    for i in beltsflights: # write the Flights part in the new file
        linhaLimpa= str(i[3])
        linhaLimpa = linhaLimpa.replace("'",'')
        operations.write(linhaLimpa)
        operations.write(', ')
        operations.write(i[0])
        operations.write(', ')
        operations.write(str((subtraction(i[1],i[2])/2)))
        operations.write(' min')
        operations.write('\n')

    operations.write('Global: \n')
    operations.write('Average delivery time = ')

    averageTime=0
    bagages=0
    for i in beltsflights: # write the Avarege delivery part in the new file
        averageTime+=((subtraction(i[1],i[2]))/2*i[-1][-1])
        bagages+=i[-1][-1]
    averageTime=averageTime/bagages
    operations.write(str(averageTime))
    operations.write('\n')

    operations.write('Longest delivery time = ')

    deliveyTime=0
    for i in beltsflights: # write the Longest delivery part in the new file
        if deliveyTime <= subtraction(i[1],i[2]):
            deliveyTime=subtraction(i[1],i[2])

    operations.write(str(deliveyTime))
    operations.close()

    return None

def subtraction(hour1, hour2):
    """
    Time that flight stays in that belt
    Requires: hour1 is a string whose content correspond to an hour as in the
    example "12:40" and hour2 is a string whose content correspond to an hour
    bigger than hour1.
    Ensures: int corresponding to the minutes between hour1 and hour2
    """

    d1 = hour1.split(':')
    d2 = hour2.split(':')
    a=[]
    b=[]
    for h in d1:
        a.append(int(h))
    for j in d2:
        b.append(int(j))
    minA=a[0]*60+a[1]
    minB=b[0]*60+b[1]


    return (minB-minA)
