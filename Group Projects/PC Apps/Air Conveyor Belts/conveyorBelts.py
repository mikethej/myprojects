"""
grupo n?38
n? 43104 Nome: Jorge Miguel Rodrigues Ferreira
n? 45095 Nome: Diana Paiva Marques
"""

import sys
import readInput
from sort import *
from assignBelts import *
from printReport import *

first_arg = sys.argv[1]
second_arg = sys.argv[2]
third_arg = sys.argv[3]

def project(inputFile=first_arg, operationBefore=second_arg, outputFile=third_arg):

    operationReport(inputFile,beltsTimes2flights(belts2flights(belts(readInput.operationReport(operationBefore)),flights(arrivalsFile('arrivals_14_16.txt')))),outputFile)

project()





